<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Region;
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
        $players->sortByDesc('pp');
        return view('regions',
            [
                'regions' => $regions,
                'players' => $players
            ]);
    }
}
