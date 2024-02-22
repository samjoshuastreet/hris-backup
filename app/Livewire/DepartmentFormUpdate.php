<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;

class DepartmentFormUpdate extends Component
{
    public $id;
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
        'email_address' => 'required|email',
        'number_of_employees' => 'required',
        'status' => 'required'
    ];

    protected $listeners = ['update' => 'update'];

    public function resetFields()
    {
        $this->resetFormFields();
    }

    public function update($id)
    {
        $target = Department::where('id', $id)->first();
        if ($target) {
            $this->id = $target->id;
            $this->department_name = $target->department_name;
            $this->description = $target->description;
            $this->location = $target->location;
            $this->contact_number = $target->contact_number;
            $this->email_address = $target->email_address;
            $this->number_of_employees = $target->number_of_employees;
            $this->status = $target->status;
        } else {
            session()->flash('message', 'Department not found!');
        }
    }

    public function update_record()
    {
        $this->validate();
        $target = Department::where('id', $this->id)->first();
        $target->department_name = $this->department_name;
        $target->description = $this->description;
        $target->location = $this->location;
        $target->contact_number = $this->contact_number;
        $target->email_address = $this->email_address;
        $target->number_of_employees = $this->number_of_employees;
        $target->status = $this->status;
        $target->save();

        session()->flash('message', 'Record successfully updated!');
        $this->dispatch('departmentCreated');
    }

    public function render()
    {
        return view('livewire.department-form-update');
    }
}
