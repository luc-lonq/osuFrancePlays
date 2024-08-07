<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use App\Models\SotwSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function sotw(): View
    {
        $sessions = SotwSession::all()->sortByDesc('date');
        $scores = Score::query()->whereDate('sotw', true)->get();
        $sotws = [];
        foreach ($sessions as $session) {
            foreach ($scores as $score) {
                if ($score->id == $session->sotw_id) {
                    $player = Player::query()->find($score->player_id);
                    $sotws[] = [
                        'session' => $session,
                        'player' => $player,
                        'score' => $score,
                    ];
                }
            }
        }

        return view('admin.sotw', [
            'sotws' => $sotws,
        ]);
    }

    public function sotwCreate(): View
    {
        $players = Player::all()->sortBy('username');

        return view('admin.sotw-create', [
            'players' => $players,
        ]);
    }

    public function sotwStore(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'player_id_sotw' => 'required',
            'screen_sotw' => 'required',
            'clip_sotw' => 'required',
        ]);

        $date = Carbon::create($request['date'])->format('Y-m-d');

        $mhs = [];
        for ($i = 1; $i <= count($request->allFiles()) - 2; $i++) {
            $mhs[] = [
                'player' => $request['player_id_mh_' . $i],
                'screen' => $request->allFiles()['screen_mh_' . $i]->store('scores', 'public'),
            ];
        }

        $screen_sotw = $request->file('screen_sotw');
        $clip_sotw = $request->file('clip_sotw');
        $screen_path = $screen_sotw->store('scores', 'public');
        $clip_path = $clip_sotw->store('scores', 'public');

        $sotw = Score::query()->create([
            'player_id' => $request['player_id_sotw'],
            'sotw' => true,
            'image_path' => $screen_path,
            'video_path' => $clip_path,
        ]);

        $mhs_ids = [];
        foreach ($mhs as $mh) {
            $mhs_score = Score::query()->create([
                'player_id' => $mh['player'],
                'sotw' => false,
                'image_path' => $mh['screen'],
            ]);
            $mhs_ids[] = $mhs_score->id;
        }

        SotwSession::query()->create([
            'sotw_id' => $sotw->id,
            'mh' => json_encode($mhs_ids),
            'date' => $date,
            'public' => false,
        ]);

        return redirect('admin/sotw');
    }

    public function sotwUpdate(Request $request, SotwSession $session): View
    {

    }
}
