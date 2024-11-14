<?php

namespace App\Jobs;

use App\Events\BalanceUpdated;
use App\Models\Employee;
use App\Models\Game;
use App\Models\Project;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessProject implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Employee $employee,
        public Project $project,
        public Game $game
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // retrieve difficulty of project and seniority of employee
        $seniority = $this->employee->seniority;
        $difficulty = $this->project->difficulty;

        // I use 5sec as a time unit for the completion of the task
        $time_occupied = 5 * ($difficulty / $seniority);

        // sleep for the seconds needed to complete the task
        sleep($time_occupied);

        // get reward from project done
        $this->game->balance += $this->project->reward;
        Game::where('id', $this->employee->game_id)->update(['balance' => $this->game->balance]);

        // change entities status
        Project::where('id', $this->project->id)->update(['status' => 'completed', 'developer_id' => $this->employee->id]);
        Employee::where('id', $this->employee->id)->update(['status' => 'unloaded']);

        // dispatch events
        BalanceUpdated::dispatch($this->game);
    }
}
