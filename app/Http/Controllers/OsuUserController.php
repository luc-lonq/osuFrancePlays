<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OsuUserController extends Controller
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

    public function login(Request $request) {
        $tokenResponse = $this->client->post('oauth/token', [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'code' => $request['code'],
                'grant_type' => 'authorization_code',
                'redirect_uri' => 'http://localhost/login',
            ],
            'timeout' => 5,
        ]);

        $tokenResponseJson = json_decode($tokenResponse->getBody()->getContents(), true);

        $meResponse = $this->client->request('GET', 'api/v2/me', [
            'headers' => [
                'Authorization' => $tokenResponseJson['token_type'] . ' ' . $tokenResponseJson['access_token'],
            ]
        ]);

        $meResponseJson = json_decode($meResponse->getBody()->getContents(), true);

        $player = Player::query()->where('osu_id', $meResponseJson['id'])->first();
        if ($player) {
            $player->update([
                'username' => $meResponseJson['username'],
            ]);
        }
        else {
            $player = Player::create([
                'osu_id' => $meResponseJson['id'],
                'username' => $meResponseJson['username'],
            ]);
        }

        $expire = Carbon::now()->addSeconds($tokenResponseJson['expires_in']);

        $user = User::query()->where('osu_id', $player->osu_id)->first();
        if ($user) {
            $user->update([
                'username' => $meResponseJson['username'],
            ]);
        }
        else {
            $user = User::create([
                'player_id' => $player->id,
                'osu_id' => $player->osu_id,
                'username' => $player->username,
                'token_type' => $tokenResponseJson['token_type'],
                'access_token' => $tokenResponseJson['access_token'],
                'refresh_token' => $tokenResponseJson['refresh_token'],
                'expire' => $expire
            ]);
        }

        Auth::login($user, true);

        return redirect('/');
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
