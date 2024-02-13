<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;

class EmployeeForm extends Component
{
    public function render()
    {
        $departments = Department::all();
        return view('livewire.employee-form', compact('departments'));
    }
}
