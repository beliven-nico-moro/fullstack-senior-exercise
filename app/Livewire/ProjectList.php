<?php

namespace App\Livewire;

use App\Events\BalanceUpdated;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectList extends Component
{
    public $projects;
    public $developers;

    public function getListeners()
    {
        return [
            'statusChanged'                             => '$refresh',
            'echo:project-processed,ProjectProcessed'   => 'projectProcessed',
            'echo:project-found,ProjectFound'           => 'checkProjects',
        ];
    }

    public function mount()
    {
        $this->projects = Auth::user()->currentGame()->availableProjects;
        $this->developers = Auth::user()->currentGame()->unloadedDevelopers;
    }

    public function render()
    {
        return view('livewire.project-list');
    }

    public function projectProcessed($data)
    {
        $this->projects = Auth::user()->currentGame()->availableProjects;

        BalanceUpdated::dispatch($data);
    }

    public function checkProjects()
    {
        $this->projects = Auth::user()->currentGame()->availableProjects;
    }
}
