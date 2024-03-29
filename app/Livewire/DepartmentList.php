<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;

class DepartmentList extends Component
{
    protected $listeners = ['departmentCreated' => 'refreshDepartmentList'];

    public function refreshDepartmentList()
    {
        $this->render();
    }


    public function delete($id)
    {
        Department::find($id)->delete();
        $this->refreshDepartmentList();
        $this->dispatch('refreshComponent');
    }

    public function update($id)
    {
        $this->dispatch('update', ['id' => $id]);
    }

    public function render()
    {
        $departments = Department::all();
        return view('livewire.department-list', compact('departments'));
    }
}
