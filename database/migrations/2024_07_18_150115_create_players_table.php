<?php

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
            $table->integer('pp');
            $table->integer('rank');
            $table->integer('country_rank');
            $table->integer('region_rank');
            $table->json('history')->nullable();
            $table->foreignIdFor(\App\Models\Region::class);
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
