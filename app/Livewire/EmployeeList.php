<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EmployeeList extends Component
{
    protected $employees;

    public function mount()
    {
        $this->employees = Auth::user()->currentGame()->employees;
    }

    public function render()
    {
        return view('livewire.employee-list', [
            'employees' => $this->employees,
        ]);
    }
}
