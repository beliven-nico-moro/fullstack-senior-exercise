<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectList extends Component
{
    protected $projects;
    protected $developers;

    public $developer_id;
    public $project_id;

    protected $listeners = [
        'projectAssigned' => '$refresh',
    ];

    public function __construct()
    {
        $this->projects = Auth::user()->currentGame()->projects;
        $this->developers = Auth::user()->currentGame()->unloadedDevelopers;
    }

    public function render()
    {
        return view('livewire.project-list', [
            'projects' => $this->projects,
            'developers' => $this->developers,
        ]);
    }

    public function assignProject()
    {
        $dev = Employee::find($this->developer_id);
        $dev->status = 'busy';
        $dev->save();

        $project = Project::find($this->project_id);
        $project->status = 'in_progress';
        $project->save();

        $this->dispatch('projectAssigned');
    }
}
