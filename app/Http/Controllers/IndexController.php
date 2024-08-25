<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use App\Models\SotwSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index() : View
    {
        $sotw_session = SotwSession::all()->sortByDesc('date')->first();

        $sotw = null;
        if ($sotw_session) {
            $sotw['score'] = Score::query()->where('id', $sotw_session->sotw_id)->first();
            $sotw['player'] = Player::query()->where('id', $sotw['score']->player_id)->first();
        }

        $startOfWeek = Carbon::now()->startOfWeek();
        $pp_current_week = Score::query()->whereDate('date', '>=', $startOfWeek)->orderBy('pp', 'desc')->get();
        foreach ($pp_current_week as $pp) {
            $pp->player_username = Player::query()->where('id', $pp->player_id)->first()->username;
        }

        $players_pp = DB::table('players')->whereNotNull('pp')->whereNotNull('current_pp')->orderBy(DB::raw("ROUND(`current_pp`) - ROUND(`pp`)"), "desc")->get();
        return view('index', [
            'sotwSession' => $sotw_session,
            'sotw' => $sotw,
            'ppCurrentWeek' => $pp_current_week,
            'playersPp' => $players_pp,
        ]);
    }
}
