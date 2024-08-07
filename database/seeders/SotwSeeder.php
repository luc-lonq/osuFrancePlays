<?php

namespace Database\Seeders;

use App\Models\Score;
use App\Models\SotwSession;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SotwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Score::factory()->create([
            'id' => 1,
            'player_id' => 22,
            'sotw' => true,
            'image_path' => '/scores/carbone_she_moves_like_a_knife.jpg',
            'video_path' => '/scores/carbone_meietruc.mp4'
        ]);

        Score::factory()->create([
            'id' => 2,
            'player_id' => 22,
            'sotw' => false,
            'image_path' => '/scores/carbone_last_attack.jpg'
        ]);

        Score::factory()->create([
            'id' => 3,
            'player_id' => 20,
            'sotw' => false,
            'image_path' => '/scores/ekoro_happppy_song.jpg'
        ]);

        Score::factory()->create([
            'id' => 4,
            'player_id' => 32,
            'sotw' => false,
            'image_path' => '/scores/lonq_noir_psalm_dla_ciebie.jpg'
        ]);

        Score::factory()->create([
            'id' => 5,
            'player_id' => 40,
            'sotw' => false,
            'image_path' => '/scores/oxvenn_embraced_by_the_flames.jpg'
        ]);

        Score::factory()->create([
            'id' => 6,
            'player_id' => 96,
            'sotw' => false,
            'image_path' => '/scores/hardstcukc_kigurumi.jpg'
        ]);

        Score::factory()->create([
            'id' => 7,
            'player_id' => 22,
            'sotw' => true,
            'image_path' => '/scores/carbone_start.jpg',
            'video_path' => '/scores/carbone_start.mp4',
        ]);

        Score::factory()->create([
            'id' => 8,
            'player_id' => 22,
            'sotw' => false,
            'image_path' => '/scores/carbone_endless_tears.jpg',
        ]);

        Score::factory()->create([
            'id' => 9,
            'player_id' => 32,
            'sotw' => false,
            'image_path' => '/scores/lonq_noir_cross_over.jpg',
        ]);

        Score::factory()->create([
            'id' => 10,
            'player_id' => 66,
            'sotw' => false,
            'image_path' => '/scores/mion_brazil.jpg',
        ]);

        Score::factory()->create([
            'id' => 11,
            'player_id' => 22,
            'sotw' => false,
            'image_path' => '/scores/carbone_sunflower.jpg',
        ]);

        Score::factory()->create([
            'id' => 12,
            'player_id' => 20,
            'sotw' => true,
            'image_path' => '/scores/ekoro_myth_orbis.jpg',
            'video_path' => '/scores/zeaqk_forget_noticed.mp4',
        ]);

        Score::factory()->create([
            'id' => 13,
            'player_id' => 10,
            'sotw' => false,
            'image_path' => '/scores/asckar_my_heart_will_go_on.jpg',
        ]);

        Score::factory()->create([
            'id' => 14,
            'player_id' => 22,
            'sotw' => false,
            'image_path' => '/scores/carbone_bang_bang.jpg',
        ]);

        Score::factory()->create([
            'id' => 15,
            'player_id' => 60,
            'sotw' => false,
            'image_path' => '/scores/fiaee_baby_got_back.jpg',
        ]);

        Score::factory()->create([
            'id' => 16,
            'player_id' => 96,
            'sotw' => false,
            'image_path' => '/scores/hardstcukc_quaver.jpg',
        ]);

        SotwSession::factory()->create([
            'id' => 1,
            'sotw_id' => 1,
            'mh' => json_encode([2,3,4,5,6]),
            'date' => Carbon::create(year:2024, month:7, day:22),
            'public' => false,
        ]);

        SotwSession::factory()->create([
            'id' => 2,
            'sotw_id' => 7,
            'mh' => json_encode([8,9,10,11]),
            'date' => Carbon::create(year:2024, month:7, day:15),
            'public' => false,
        ]);

        SotwSession::factory()->create([
            'id' => 3,
            'sotw_id' => 12,
            'mh' => json_encode([13,14,15,16]),
            'date' => Carbon::create(year:2024, month:7, day:8),
            'public' => false,
        ]);


    }
}
