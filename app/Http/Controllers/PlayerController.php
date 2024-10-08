<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Region;
use App\Models\Score;
use App\Models\SotwSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PlayerController extends Controller
{
    public function show(int $osu_id): View
    {
        $player = Player::query()->where('osu_id', $osu_id)->first();
        $region = Region::find($player->region_id);
        $sotw_sessions = SotwSession::all()->sortByDesc('date');

        $mhs_player = [];
        $sotws_player = [];
        foreach ($sotw_sessions as $sotw_session) {
            $score = Score::query()->where('id', $sotw_session->sotw_id)->first();
            if ($score->player_id == $player->id) {
                $sotws_player[] = $score;
            }

            foreach (json_decode($sotw_session->mh) as $mh) {
                $score = Score::query()->where('id', $mh)->first();
                if ($score->player_id == $player->id) {
                    $mhs_player[] = $score;
                }
            }
        }

        return view('player.show', [
            'player' => $player,
            'region' => $region,
            'mhs' => $mhs_player,
            'sotws' => $sotws_player,
        ]);
    }

    public function edit(): View {
        $user = Auth::user();
        $player = Player::query()->find($user->player_id);
        $regions = Region::all();

        return view('player.edit', [
            'player' => $player,
            'regions' => $regions,
        ]);
    }

    public function update(int $id, Request $request) {
        $player = Player::query()->find($id);
        $player->new_region = $request->region;
        $player->save();

        return redirect('/players/settings');
    }
}
