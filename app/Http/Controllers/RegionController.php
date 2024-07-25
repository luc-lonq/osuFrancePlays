<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Player;
use App\Models\Region;
use Illuminate\View\View;

class RegionController extends Controller
{
    public function index(): View
    {
        $regions = Region::all();
        $players = [];
        return view('regions',
            [
                'regions' => $regions,
                'players' => $players
            ]);
    }

    public function show(int $id): View
    {
        $regions = Region::all();
        $players = Player::query()->where('region_id', $id)->orderBy('region_rank')->get();
        $last_history = History::query()->where('region_id', $id)->orderBy('updated_at', 'desc')->first();
        $players->sortByDesc('pp');
        return view('regions',
            [
                'regions' => $regions,
                'players' => $players,
                'lastHistory' => $last_history
            ]);
    }

    public function history(int $id): View
    {
        $regions = Region::all();
        $players = Player::query()->where('region_id', $id)->orderBy('region_rank')->get();
        return view('regions',
            [
                'regions' => $regions,
                'players' => $players,
            ]);
    }
}
