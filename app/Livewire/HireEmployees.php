<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HireEmployees extends Component
{
    public $employees;

    public function getListeners()
    {
        return [
            'employeeChanged'   => '$refresh',
            'statusChanged'     => '$refresh',
            'employeeHired'     => '$refresh',
        ];
    }

    public function mount()
    {
        $this->employees = $this->getEmployees();
    }

    public function render()
    {
        return view('livewire.hire-employees');
    }

    protected function getEmployees()
    {
        $employeesToHire = Auth::user()->currentGame()->employeesToHire;

        if ($employeesToHire->isEmpty()) {
            $employeesToHire = Employee::factory()->count(3)->create([
                'game_id' => Auth::user()->currentGame()->id,
            ]);
        }
        return $employeesToHire;
    }
}
