<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use App\Models\SotwSession;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SotwController extends Controller
{
    public function show($date = null): View
    {
        if($date == null) {
            $sotw_session = SotwSession::all()->sortByDesc('created_at')->first();
        }
        else {
            $sotw_session = SotwSession::query()->where('date', $date)->first();
        }

        $sotw['score'] = Score::query()->where('id', $sotw_session->sotw_id)->first();
        $sotw['player'] = Player::query()->where('id', $sotw['score']->player_id)->first();

        $mhs = [];
        foreach (json_decode($sotw_session->mh) as $mh) {
            $score = Score::query()->where('id', $mh)->first();
            $mhs[] = [
                'score' => $score,
                'player' => Player::query()->where('id', $score->player_id)->first(),
            ];
        }

        $sotws = SotwSession::all()->sortByDesc('date');
        $sotws->forget(0);

        return view('sotw.index', [
            'sotwSession' => $sotw_session,
            'sotw' => $sotw,
            'sotws' => $sotws,
            'mhs' => $mhs,
        ]);
    }
}
