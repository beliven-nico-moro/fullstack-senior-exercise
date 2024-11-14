<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PrepareGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:prepare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare the database for the game';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Preparing DB...');
        $this->call('migrate:fresh');

        $this->info('Seed DB...');
        $this->call('db:seed');

        $this->info('Game prepared!');
    }
}
