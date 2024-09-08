<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Player;
use App\Models\Region;
use App\Models\Score;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;

class OsuApiController extends Controller
{
    protected $client;
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://osu.ppy.sh/',
        ]);
        $this->clientId = env('OSU_CLIENT_ID');
        $this->clientSecret = env('OSU_CLIENT_SECRET');
    }

    public function getAccessToken()
    {
        $response = $this->client->post('oauth/token', [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => 'client_credentials',
                'scope' => 'public',
            ],
            'timeout' => 5,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getFrenchRanking(int $page)
    {
        $response = $this->client->get('api/v2/rankings/osu/performance', [
            'query' => [
                'country' => 'FR',
                'page' => $page,
            ],
            'headers' => [
                'Authorization' => $this->getAccessToken()['token_type'] . ' ' . $this->getAccessToken()['access_token']
            ],
            'timeout' => 5,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function updatePlayersData()
    {
        $this->saveLastRanking();
        for ($page = 1; $page <= env('OSU_RANKING_PAGE'); $page++) {
            foreach ($this->getFrenchRanking($page)['ranking'] as $key=>$ranking) {
                $player = Player::query()->where('osu_id', $ranking['user']['id'])->first();
                if ($player) {
                    $player->username = $ranking['user']['username'];
                    $player->pp = $ranking['pp'];
                    $player->rank = $ranking['global_rank'];
                    $player->country_rank = ($page - 1) * 50 + $key + 1;
                    if ($player->new_region) {
                        $player->region_id = $player->new_region;
                        $player->new_region = null;
                    }
                    $player->save();
                }
                else {
                    Player::query()->create([
                        'osu_id' => $ranking['user']['id'],
                        'username' => $ranking['user']['username'],
                        'pp' => $ranking['pp'],
                        'rank' => $ranking['global_rank'],
                        'country_rank' => ($page - 1) * 50 + $key + 1,
                    ]);
                }
            }
            sleep(2);
        }
        $this->sortRegionsRanking();
    }

    public function sortRegionsRanking()
    {
        $regions = Region::all();
        foreach ($regions as $region) {
            $playersRegion = Player::query()->where('region_id', $region->id)->orderByDesc('pp')->get();
            foreach ($playersRegion as $key=>$playerRegion) {
                $player = Player::query()->find($playerRegion->id);
                $player['region_rank'] = $key + 1;
                $player->save();
            }
        }
    }

    public function saveLastRanking()
    {
        $datetime = Carbon::now();
        $datetime->subDays(7);

        $regions = Region::all();
        foreach ($regions as $region) {
            $playersRegion = Player::query()->where('region_id', $region->id)->orderByDesc('pp')->get();
            $playersArr = [];
            foreach ($playersRegion as $key=>$playerRegion) {
                $player = Player::query()->find($playerRegion->id);
                $playersArr[$player['osu_id']] = [
                    'rank' => $player['rank'],
                    'country_rank' => $player['country_rank'],
                    'region_rank' => $player['region_rank'],
                    'pp' => round($player['pp']),
                ];
            }
            $history = History::query()->create([
                'region_id' => $region->id,
                'date' => $datetime->format('Y-m-d'),
                'ranking' => json_encode($playersArr)]);
        }
    }

    public function updateTopScores() {
        $now = Carbon::now();
        for ($page = 1; $page <= env('OSU_RANKING_PP_PAGE'); $page++) {
            foreach ($this->getFrenchRanking($page)['ranking'] as $ranking) {
                $player = Player::query()->where('osu_id', $ranking['user']['id'])->first();
                if($player->username != $ranking['user']['username']) {
                    $player->username = $ranking['user']['username'];
                    $user = User::query()->where('osu_id', $ranking['user']['id'])->first();
                    if($user) {
                        $user->username = $ranking['user']['username'];
                        $user->save();
                    }
                    $player->save();
                }
                if ($player->current_pp != $ranking['pp']) {
                    $scores = $this->getUserTopScores($player->osu_id);
                    foreach ($scores as $score) {
                        $score_date = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $score['created_at'], 'UTC');
                        if ($score['pp'] >= 600 and
                            $score_date->month == $now->month and
                            $score_date->year == $now->year) {
                            if (!Score::query()->where('score_id', $score['id'])->exists()) {
                                Score::query()->create([
                                    'player_id' => $player->id,
                                    'score_id' => $score['id'],
                                    'pp' => $score['pp'],
                                    'date' => $score_date,
                                    'map' => $score['beatmapset']['title'],
                                    'diff' => $score['beatmap']['version'],
                                ]);
                            }
                        }
                    }
                    $player->current_pp = $ranking['pp'];
                    $player->save();
                    sleep(2);
                }
            }
            sleep(2);
        }
    }

    public function getUserTopScores(int $osu_id) {
        $response = $this->client->get('api/v2/users/'.$osu_id.'/scores/best', [
            'query' => [
                'legacy_only' => true,
                'mode' => 'osu',
                'limit' => 100,
            ],
            'headers' => [
                'Authorization' => $this->getAccessToken()['token_type'] . ' ' . $this->getAccessToken()['access_token']
            ],
            'timeout' => 5,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
