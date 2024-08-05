<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use App\Models\SotwSession;
use Carbon\Carbon;
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

    public function stats($year = null): View
    {
        $years = [];
        if (!$year){
            $sotw_sessions = SotwSession::all()->sortByDesc('date');
        }
        else {
            $sotw_sessions = SotwSession::query()->whereYear('date', $year)->get();
        }
        $years_sotw = SotwSession::all()->sortByDesc('date');
        foreach ($years_sotw as $year_sotw) {
            $years[] = Carbon::create($year_sotw->date)->format('Y');
        }
        $years = array_unique($years);

        $n_sotw = 0;
        $n_mhs = 0;
        $sotw_per_player = [];
        $mh_per_player = [];
        foreach ($sotw_sessions as $sotw_session) {
            $sotw = Score::query()->where('id', $sotw_session->sotw_id)->first();
            $sotw_player = Player::query()->where('id', $sotw->player_id)->first();
            $sotw_per_player[$sotw_player->username][] = $sotw;
            $n_sotw++;

            foreach (json_decode($sotw_session->mh) as $mh) {
                $mh = Score::query()->where('id', $mh)->first();
                $mh_player = Player::query()->where('id', $mh->player_id)->first();
                $mh_per_player[$mh_player->username][] = $mh;
                $n_mhs++;
            }
        }

        arsort($sotw_per_player);
        arsort($mh_per_player);

        $stats_sotw = [];
        foreach ($sotw_per_player as $username=>$score) {
            $stats_sotw[$username] = count($score);
        }

        $reduced_stats_sotw = $stats_sotw;
        while(count($reduced_stats_sotw) > 10) {
            array_pop($reduced_stats_sotw);
        }

        if(count($reduced_stats_sotw) != count($stats_sotw)) {
            $total = $n_sotw;
            foreach($reduced_stats_sotw as $amount) {
                $total -= $amount;
            }
            $reduced_stats_sotw['Autres'] = $total;
        }

        $chart_sotw = [];
        foreach($reduced_stats_sotw as $username=>$amount) {
            $chart_sotw['username'][] = $username;
            $chart_sotw['amount'][] = $amount;
        }

        $stats_mh = [];
        foreach ($mh_per_player as $username=>$score) {
            $stats_mh[$username] = count($score);
        }

        $reduced_stats_mh = $stats_mh;
        while(count($reduced_stats_mh) > 10) {
            array_pop($reduced_stats_mh);
        }

        if(count($reduced_stats_mh) != count($stats_mh)) {
            $total = $n_mhs;
            foreach($reduced_stats_mh as $amount) {
                $total -= $amount;
            }
            $reduced_stats_mh['Autres'] = $total;
        }

        $chart_mh = [];
        foreach($reduced_stats_mh as $username=>$amount) {
            $chart_mh['username'][] = $username;
            $chart_mh['amount'][] = $amount;
        }

        return view('sotw.stats', [
            'statsSotw' => $stats_sotw,
            'statsMh' => $stats_mh,
            'chartSotw' => $chart_sotw,
            'chartMh' => $chart_mh,
            'years' => $years
        ]);
    }
}
