<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\Attributes\On;

class EmployeeCard extends Component
{
    public Employee $employee;

    public function getListeners()
    {
        return [
            'statusChanged' => '$refresh',
        ];
    }

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee-card');
    }
}
