<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the project';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Preparing DB...');
        $this->call('migrate:fresh');

        $this->info('Seed DB...');
        $this->call('db:seed');

        $this->info('Game started!');
    }
}
