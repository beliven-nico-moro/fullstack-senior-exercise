<?php

namespace App\Livewire;

use App\Events\BalanceUpdated;
use App\Jobs\ProcessProject;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectCard extends Component
{
    public Project $project;
    public $developers;

    public $developer_id;
    public $project_id;

    public function getListeners()
    {
        return [
            'statusChanged'     => '$refresh',
            'checkDevelopers'   => 'checkDevelopers',
        ];
    }

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->developers = Auth::user()->currentGame()->unloadedDevelopers;
    }

    public function render()
    {
        return view('livewire.project-card');
    }

    public function assignProject()
    {
        $this->dispatch('checkDevelopers');

        $dev = Employee::find($this->developer_id);
        $dev->status = 'busy';
        $dev->save();

        $project = Project::find($this->project_id);
        $project->status = 'in_progress';
        $project->save();

        $this->dispatch('statusChanged');

        $game = Auth::user()->currentGame();

        ProcessProject::dispatch($dev, $project, $game);
    }

    public function checkDevelopers()
    {
        $this->developers = Auth::user()->currentGame()->unloadedDevelopers;
    }
}
