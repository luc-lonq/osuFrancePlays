<?php

use App\Models\Player;
use App\Models\Region;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->integer('osu_id');
            $table->string('username');
            $table->float('pp')->nullable();
            $table->float('current_pp')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('country_rank')->nullable();
            $table->integer('region_rank')->nullable();
            $table->foreignIdFor(Region::class)->nullable();
            $table->foreignIdFor(Region::class, 'new_region')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
