<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\User;
use Livewire\Component;

class DepartmentForm extends Component
{
    public $department_name;
    public $description;
    public $location;
    public $contact_number;
    public $email_address;
    public $number_of_employees;
    public $status;

    protected $rules = [
        'department_name' => 'required',
        'description' => 'required|min:20|max:225',
        'location' => 'nullable',
        'contact_number' => 'required|max:13',
        'email_address' => 'required|email|unique:departments',
        'number_of_employees' => 'required',
        'status' => 'required'
    ];

    public function create()
    {
        $this->validate();
        Department::create([
            'department_name' => $this->department_name,
            'description' => $this->description,
            'location' => $this->location,
            'contact_number' => $this->contact_number,
            'email_address' => $this->email_address,
            'number_of_employees' => $this->number_of_employees,
            'status' => $this->status
        ]);
        session()->flash('message', 'Department created successfully!');

        $this->resetFormFields();

        $this->dispatch('departmentCreated');
    }

    private function resetFormFields()
    {
        $this->department_name = '';
        $this->description = '';
        $this->location = '';
        $this->contact_number = '';
        $this->email_address = '';
        $this->number_of_employees = '';
        $this->status = '';
    }

    public function render()
    {
        return view('livewire.department-form');
    }
}
