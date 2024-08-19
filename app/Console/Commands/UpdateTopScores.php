<?php

namespace App\Console\Commands;

use App\Http\Controllers\OsuApiController;
use Illuminate\Console\Command;

class UpdateTopScores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-top-scores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new OsuApiController();
        $controller->updateTopScores();
        $this->line('update top scores');
        return 0;
    }
}
