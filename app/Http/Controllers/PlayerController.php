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
    public function show(int $id): View
    {
        $player = Player::find($id);
        $region = Region::find($player->region_id);
        $mhs = Score::all()->sortByDesc('created_at');
        $mhs_player = [];
        $sotws_player = [];
        foreach ($mhs as $mh) {
            if ($mh->player_id == $player->id && $mh->pp == null) {
                if ($mh->sotw) {
                    $sotws_player[] = $mh;
                }
                else {
                    $mhs_player[] = $mh;
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
