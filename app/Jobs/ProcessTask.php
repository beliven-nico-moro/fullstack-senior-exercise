<?php

namespace App\Jobs;

use App\Models\Employee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessTask implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(Employee $employee)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // lock employee
        // change task status
        // sleep for the seconds needed to complete the task
        // change task status
        // end
    }
}
