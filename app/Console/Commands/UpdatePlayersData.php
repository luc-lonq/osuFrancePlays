<?php

namespace App\Console\Commands;

use App\Http\Controllers\OsuApiController;
use Illuminate\Console\Command;

class UpdatePlayersData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-players-data';

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
        $controller->updatePlayersData();
        $this->line('update players data');
        return 0;
    }
}
