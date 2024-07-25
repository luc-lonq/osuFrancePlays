<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Player;
use App\Models\Region;
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

        return json_decode($response->getBody()->getContents(), true)['access_token'];
    }

    public function getFrenchRanking(int $page)
    {
        $response = $this->client->get('api/v2/rankings/osu/performance', [
            'query' => [
                'country' => 'FR',
                'page' => $page,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getAccessToken()
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
                    $player->pp = $ranking['pp'];
                    $player->rank = $ranking['global_rank'];
                    $player->country_rank = ($page - 1) * 50 + $key + 1;
                    $player->save();
                }
            }
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
                    'pp' => $player['pp'],
                ];
            }
            $history = History::query()->create([
                'region_id' => $region->id,
                'date' => $datetime->format('Y-m-d'),
                'ranking' => json_encode($playersArr)]);
        }
    }
}
