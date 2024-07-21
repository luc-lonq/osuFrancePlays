<?php

namespace App\Http\Controllers;

use App\Models\Player;
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
        $page = 1;
        foreach ($this->getFrenchRanking($page)['ranking'] as $key => $ranking) {
            $player = Player::query()->where('osu_id', $ranking['user']['id'])->first();
            $player->pp = $ranking['pp'];
            $player->rank = $ranking['global_rank'];
            $player->country_rank = ($page - 1) * 50 + $key + 1;
            $player->save();
        }
    }
}
