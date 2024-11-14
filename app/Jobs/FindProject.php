<?php

namespace App\Jobs;

use App\Events\ProjectFound;
use App\Models\Employee;
use App\Models\Game;
use App\Models\Project;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FindProject implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Employee $employee,
        public Game $currentGame
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // retrieve seniority of employee
        $seniority = $this->employee->seniority;

        // I use 5sec as a time unit for the completion of the task
        $time_occupied = 5 * $seniority;

        // sleep for the seconds needed to complete the task
        sleep($time_occupied);

        // found a new project
        Project::create([
            'name'          => fake()->sentence(3),
            'difficulty'    => $seniority,
            'reward'        => rand(1000 * ($seniority - 1), 1000 * $seniority),
            'status'        => 'pending',
            'game_id'       => $this->currentGame->id,
        ]);

        // change employee status
        Employee::where('id', $this->employee->id)->update(['status' => 'unloaded']);

        // dispatch events
        ProjectFound::dispatch();
    }
}
