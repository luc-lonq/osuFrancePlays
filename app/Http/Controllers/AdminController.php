<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use App\Models\SotwSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::guest()) {
            abort(403);
        }

        return view('admin.index');
    }

    public function sotw(): View
    {
        if(Auth::guest()) {
            abort(403);
        }

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
        if(Auth::guest()) {
            abort(403);
        }

        $players = Player::all()->sortBy('username');

        return view('admin.sotw-create', [
            'players' => $players,
        ]);
    }

    public function sotwStore(Request $request)
    {
        if(Auth::guest()) {
            abort(403);
        }

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

    public function sotwEdit(int $id): View
    {
        if(Auth::guest()) {
            abort(403);
        }

        $sotw_session = SotwSession::query()->find($id);
        $sotw = Score::query()->find($sotw_session->sotw_id);
        $mhs = [];
        foreach (json_decode($sotw_session->mh) as $mh) {
            $mhs[] = Score::query()->find($mh);
        }
        $players = Player::all()->sortBy('username');

        return view('admin.sotw-edit', [
            'sotwSession' => $sotw_session,
            'sotw' => $sotw,
            'mhs' => $mhs,
            'players' => $players,
        ]);
    }

    public function sotwUpdate(int $id, Request $request)
    {
        if(Auth::guest()) {
            abort(403);
        }

        $request->validate([
            'date' => 'required',
        ]);

        $date = Carbon::create($request['date'])->format('Y-m-d');

        $sotw_session = SotwSession::query()->find($id);
        $sotw = Score::query()->find($sotw_session->sotw_id);

        if ($request->hasFile('screen_sotw')) {
            $screen_sotw = $request->file('screen_sotw');
            $screen_path = $screen_sotw->store('scores', 'public');
        }
        else {
            $screen_path = $sotw->image_path;
        }

        if ($request->hasFile('clip_sotw')) {
            $clip_sotw = $request->file('clip_sotw');
            $clip_path = $clip_sotw->store('scores', 'public');
        }
        else {
            $clip_path = $sotw->video_path;
        }

        Score::query()->find($sotw->id)->update([
            'player_id' => $request['player_id_sotw'],
            'image_path' => $screen_path,
            'video_path' => $clip_path,
        ]);

        $mhs = [];
        foreach (json_decode($sotw_session->mh) as $mh) {
            if ($request->hasFile('screen_mh_' . $mh)) {
                $screen_sotw = $request->file('screen_mh_' . $mh);
                $screen_path = $screen_sotw->store('scores', 'public');
            }
            else {
                $screen_path = Score::query()->find($mh)->image_path;
            }

            if ($request['player_id_mh_' . $mh]) {
                Score::query()->find($mh)->update([
                    'player_id' => $request['player_id_mh_' . $mh],
                    'image_path' => $screen_path,
                ]);
                $mhs[] = $mh;
            }
            else {
                Score::query()->find($mh)->delete();
            }
        }

        $requestAll = $request->all();

        $newMhPlayerKeys = preg_grep("/^player_id_mh_new_/", array_keys($requestAll));
        $newMhPlayerValues = array_intersect_key($requestAll, array_flip($newMhPlayerKeys));
        $newMhScreenKeys = preg_grep("/^screen_mh_new_/", array_keys($requestAll));
        $newMhScreenValues = array_intersect_key($requestAll, array_flip($newMhScreenKeys));

        $newMhs = [];
        $index = 0;
        foreach ($newMhPlayerValues as $player) {
            $newMhs[$index]['player'] = $player;
            $index++;
        }

        $index = 0;
        foreach ($newMhScreenValues as $key=>$screen) {
            $screen = $request->file($key);
            $screen_path = $screen->store('scores', 'public');
            $newMhs[$index]['screen'] = $screen_path;
            $index++;
        }

        foreach ($newMhs as $mh) {
            $mhs[] = Score::query()->create([
                'player_id' => $mh['player'],
                'image_path' => $mh['screen'],
            ])->id;
        }

        SotwSession::query()->find($id)->update([
            'date' => $date,
            'mh' => json_encode($mhs),
        ]);

        return redirect('admin/sotw/edit/' . $id);
    }

    public function sotwDelete(int $id) {
        $sotw_session = SotwSession::query()->find($id);
        foreach (json_decode($sotw_session->mh) as $mh) {
            Score::query()->find($mh)->delete();
        }
        $sotw_session->delete();

        return redirect('/admin/sotw');
    }
}
