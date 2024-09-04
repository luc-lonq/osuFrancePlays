<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('app:update-players-data')->weeklyOn(1, '0:00');
Schedule::command('app:update-top-scores')->hourly();
