<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;

class EmployeeList extends Component
{

    protected $listeners = ['employeeCreated', 'render'];
    public function render()
    {
        $employees = Employee::all();
        return view('livewire.employee-list', compact('employees'));
    }
}
