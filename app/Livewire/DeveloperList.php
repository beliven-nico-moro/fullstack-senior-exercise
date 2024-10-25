<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DeveloperList extends Component
{
    protected $employees;

    protected $listeners = [
        'projectAssigned' => '$refresh',
    ];

    public function __construct()
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
