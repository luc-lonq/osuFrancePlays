<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Region;
use App\Models\Update;
use Illuminate\Http\Request;
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
        $players = Player::query()->where('region_id', $id)->get();
        $last_update = Update::all()->last();
        $players->sortByDesc('pp');
        return view('regions',
            [
                'regions' => $regions,
                'players' => $players,
                'lastUpdate' => $last_update
            ]);
    }

    public function history(int $id): View
    {
        return view();
    }
}
