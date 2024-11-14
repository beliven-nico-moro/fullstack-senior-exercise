<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HireEmployeeCard extends Component
{
    public Employee $employee;
    public $balance;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
        $this->balance = Auth::user()->currentGame()->balance;
    }

    public function render()
    {
        return view('livewire.hire-employee-card');
    }

    public function hireEmployee($employeeId)
    {
        Employee::where('id', $employeeId)->update(['hired' => true]);

        $this->dispatch('employeeHired');
    }

    public function removeEmployee($employeeId)
    {
        Employee::where('id', $employeeId)->delete();

        $this->dispatch('employeeChanged');
    }
}
