<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Player;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\View\View;

class RegionController extends Controller
{
    public function index(): View
    {
        $regions = Region::all();
        $players = [];
        return view('regions.ranking',
            [
                'regions' => $regions,
                'players' => $players
            ]);
    }

    public function show(int $id): View
    {
        $regions = Region::all();
        $region = Region::query()->where('id', $id)->first();
        $players = Player::query()->where('region_id', $id)->orderBy('region_rank')->get();
        $last_history = History::query()->where('region_id', $id)->orderBy('updated_at', 'desc')->first();
        $players->sortByDesc('pp');
        $date = ($players->first()->updated_at);
        $history_all = History::query()->where('region_id', $id)->orderBy('created_at', 'desc')->get();
        $history_dates = [];
        foreach ($history_all as $hist) {
            $history_dates[] = $hist->date;
        }
        return view('regions.ranking',
            [
                'regions' => $regions,
                'players' => $players,
                'lastHistory' => $last_history,
                'historyDates' => $history_dates,
                'region' => $region,
                'date' => $date,
            ]);
    }

    public function history(int $id, string $date): View
    {
        $regions = Region::all();
        $region = Region::query()->where('id', $id)->first();
        $history = History::query()->where(['region_id' => $id, 'date' => $date])->first();
        $history_all = History::query()->where('region_id', $id)->orderBy('created_at', 'desc')->get();
        $history_dates = [];
        foreach ($history_all as $hist) {
            $history_dates[] = $hist->date;
        }
        $players = [];
        foreach (json_decode($history->ranking, true) as $key=>$row) {
            $player = Player::query()->where('osu_id', $key)->first();
            $players[] = $player;
        }
        return view('regions.history',
            [
                'regions' => $regions,
                'players' => $players,
                'history' => $history,
                'historyDates' => $history_dates,
                'region' => $region,
                'date' => $date,
            ]);
    }
}
