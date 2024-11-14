<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DeveloperList extends Component
{
    protected $employees;

    public function getListeners()
    {
        return [
            'projectAssigned' => '$refresh',
        ];
    }

    public function mount()
    {
        $this->employees = Auth::user()->currentGame()->developers;
    }

    public function render()
    {
        return view('livewire.developer-list', [
            'employees' => $this->employees,
        ]);
    }
}
