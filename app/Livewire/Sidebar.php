<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = ['departmentCreated' => 'render', 'refreshComponent' => 'render'];

    public function render()
    {
        $departments = Department::all();
        return view('livewire.sidebar', compact('departments'));
    }
}
