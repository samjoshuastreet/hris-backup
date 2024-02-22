<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Events\EmployeeAdded;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();
        $employees = Employee::all();
        return view('employee.index', compact('departments', 'employees', 'employee'));
    }

    public function render_employee_list(Request $request)
    {
        $employees = Employee::all();
        return view('employee.ajax.employee_list', compact('employees'))->render();
    }

    public function firstValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'nullable',
            'email_address' => 'email|required|unique:employees',
            'date_of_birth' => 'nullable',
            'permanent_address' => 'nullable',
            'current_address' => 'nullable',
            'contact_number' => 'required',
            'status' => 'required|in:active,inactive,on_leave',
            'department' => 'required|exists:departments,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        } else {
            return response()->json(['success' => true]);
        }
    }

    public function thirdValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        } else {
            return response()->json(['success' => true]);
        }
    }

    public function fourthValidation(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->password = $request->input('password');
            $user->email = $request->input('email_address');
            $user->save();

            $target = User::where('email', $request->input('email_address'))->first();

            $employee = new Employee();
            $employee->first_name = $request->input('first_name');
            $employee->middle_name = $request->input('middle_name');
            $employee->last_name = $request->input('last_name');
            $employee->gender = $request->input('gender');
            $employee->email_address = $request->input('email_address');
            $employee->date_of_birth = $request->input('date_of_birth');
            $employee->permanent_address = $request->input('permanent_address');
            $employee->current_address = $request->input('current_address');
            $employee->contact_number = $request->input('contact_number');
            $employee->status = $request->input('status');
            $employee->department_id = $request->input('department');

            if ($request->hasFile('employee_photo_two')) {
                $employee_photo = $request->file('employee_photo_two')->store('employees', 'public');
                $employee->employee_photo = $employee_photo;
            }

            $employee->user_id = $target->id;

            $employee->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function image_upload(Request $request)
    {
        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $image_name = 'upload/' . time() . '.png';
        file_put_contents($image_name, $data);
        echo $image_name;
        return response()->json(['success' => true]);
    }

    public function view($id)
    {
        $departments = Department::all();
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();
        $target = Employee::find($id);
        return view('employee.profile', compact('target', 'departments', 'employee'));
    }
}
