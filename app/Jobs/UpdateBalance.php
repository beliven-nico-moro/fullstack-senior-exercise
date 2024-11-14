<?php

namespace App\Jobs;

use App\Events\BalanceUpdated;
use App\Models\Game;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateBalance implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    public $uniqueFor = 60;

    /**
     * Create a new job instance.
     */
    public function __construct(public Game $game)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $employees = $this->game->hiredEmployees();

        $salaries = 0;
        foreach ($employees as $employee) {
            $salaries += $employee->salary;
        }

        $this->game->balance -= $salaries;

        $this->game->save();

        BalanceUpdated::dispatch($this->game);
    }
}
