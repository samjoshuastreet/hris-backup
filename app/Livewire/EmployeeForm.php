<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class EmployeeForm extends Component
{

    use WithFileUploads;

    public $step = 1;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $email_address;
    public $email;
    public $date_of_birth;
    public $permanent_address;
    public $current_address;
    public $contact_number;
    public $status;
    public $department_id;
    public $employee_photo;

    public $salary;
    public $employment_type;
    public $position;

    public $name;
    public $password;

    protected $firstData = [];
    protected $secondData;
    protected $thirdData = [];

    public function nextStep()
    {
        if ($this->step == 1) {
            $this->firstData = $this->validate([
                'first_name' => 'required|max:255',
                'middle_name' => 'nullable|max:255',
                'last_name' => 'required|max:255',
                'gender' => 'required',
                'email_address' => 'email|required|unique:employees',
                'date_of_birth' => 'nullable',
                'permanent_address' => 'nullable',
                'current_address' => 'nullable',
                'contact_number' => 'nullable',
                'status' => 'required',
                'department_id' => 'required',
                'employee_photo' => 'nullable|image|max:2058'
            ]);
        } elseif ($this->step == 3) {
            $this->email = $this->email_address;
            try {
                $this->thirdData = $this->validate([
                    'name' => 'required|unique:users',
                    'password' => 'required|min:8',
                    'email' => 'email|unique:users'
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                $this->step = 1;
                $this->thirdData = $this->validate([
                    'name' => 'required|unique:users',
                    'password' => 'required|min:8',
                    'email' => 'email|unique:users'
                ]);
            }
        }

        $this->step = $this->step + 1;
        $this->render();
    }

    public function resetStep()
    {
        $this->step = 1;
    }

    public function prevStep()
    {
        $this->step = $this->step - 1;
        $this->render();
    }

    public function removeImg()
    {
        $this->employee_photo = null;
    }

    public function confirmation()
    {
        $this->dispatch('swal', [
            'title' => 'Feedback Saved',
            'timer' => 3000,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-right'
        ]);
    }

    public function create()
    {
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email_address;
        $user->password = $this->password;
        $user->save();

        $target = User::where('name', $user->name)->first();

        $employee = new Employee();
        $employee->first_name = $this->first_name;
        $employee->middle_name = $this->middle_name;
        $employee->last_name = $this->last_name;
        $employee->gender = $this->gender;
        $employee->email_address = $this->email_address;
        $employee->date_of_birth = $this->date_of_birth;
        $employee->permanent_address = $this->permanent_address;
        $employee->current_address = $this->current_address;
        $employee->contact_number = $this->contact_number;
        $employee->status = $this->status;
        $employee->department_id = $this->department_id;
        $employee->user_id = $target->id;
        $employee_photo_path = $this->employee_photo->store('employees', 'public');
        $this->employee_photo = $employee_photo_path;
        $employee->save();


        $this->resetForm();
        $this->resetStep();
        session()->flash('message', 'Record successfully updated!');

        $this->dispatch('employeeCreated');
    }

    public function resetForm()
    {
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->email_address = '';
        $this->date_of_birth = '';
        $this->permanent_address = '';
        $this->current_address = '';
        $this->contact_number = '';
        $this->status = '';
        $this->department_id = '';
        $this->employee_photo = '';
        $this->name = '';
        $this->password = '';
    }

    public function render()
    {
        $step = $this->step;
        $departments = Department::all();
        if ($step == 4) {
            $target = Department::find($this->department_id);
            return view('livewire.employee-form', compact('departments', 'step', 'target'));
        }
        return view('livewire.employee-form', compact('departments', 'step'));
    }
}
