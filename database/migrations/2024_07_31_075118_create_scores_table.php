<?php

use App\Models\Player;
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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Player::class);
            $table->boolean('sotw')->nullable();
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->float('pp')->nullable();
            $table->datetime('date')->nullable();
            $table->bigInteger('score_id')->nullable();
            $table->string('map')->nullable();
            $table->string('diff')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
