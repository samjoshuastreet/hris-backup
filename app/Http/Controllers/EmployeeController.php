<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Attendance;
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
        $list_mode = true;
        return view('employee.index', compact('departments', 'employees', 'employee', 'list_mode'));
    }

    public function render_employee_list(Request $request)
    {
        $employees = Employee::all();
        $list_mode = true;
        return view('employee.ajax.employee_list', compact('employees', 'list_mode'))->render();
    }

    public function grid_view()
    {
        $employees = Employee::all();
        $list_mode = false;
        return view('employee.ajax.employee_grid', compact('employees', 'list_mode'))->render();
    }

    public function list_view()
    {
        $employees = Employee::all();
        $list_mode = true;
        return view('employee.ajax.employee_list', compact('employees',  'list_mode'))->render();
    }

    public function render_activity(Request $request)
    {
        $target = Attendance::find($request->input('index'));
        $mode = $request->input('mode');
        $employee = Employee::find($target->employee_id);
        return view('attendance.ajax.activity_modal', compact('target', 'mode', 'employee'))->render();
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

    public function view($id)
    {
        $departments = Department::all();
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();

        $target = Employee::find($id);
        $attendance_data = $target->attendanceData;

        if ($attendance_data->isEmpty()) {
            $attendance_data = collect();
        } elseif ($attendance_data->count() > 5) {
            $attendance_data = Attendance::where('employee_id', $target->id)
                ->orderBy('date', 'desc')
                ->paginate(5);
        }

        return view('employee.profile', compact('target', 'departments', 'attendance_data', 'employee'));
    }

    public function custom_sort(Request $request)
    {
        $employees = collect();
        $department_filter = false;
        $gender_filter = false;

        // Department Filtering
        $department_ids = Department::pluck('id')->toArray();
        foreach ($department_ids as $department_id) {
            if ($request->has($department_id)) {
                $department_filter = true;
                $temp_employee = Employee::where('department_id', $department_id)->get();
                $employees = $employees->merge($temp_employee);
            }
        }

        if ($department_filter == false) {
            $employees = Employee::all();
        }

        // Gender Filtering
        $genderOptions = ['male', 'female', 'non_binary'];
        $selectedGenders = [];

        foreach ($genderOptions as $gender) {
            if ($request->has($gender . '_sort')) {
                $selectedGenders[] = $gender;
            }
        }

        if (!empty($selectedGenders)) {
            $gender_filter = true;
            $employees = $employees->filter(function ($employee) use ($selectedGenders) {
                return in_array($employee->gender, $selectedGenders);
            });
        }

        if (!$department_filter && !$gender_filter) {
            $employees = Employee::all();
        }

        // Order By Options
        $orderOptions = $request->input('order_by');

        if ($request->has('name_sort')) {
            $nameSort = $request->input('name_sort');
            if ($nameSort == 'off') {
            } elseif ($nameSort == 'first_name') {
                $employees = $employees->sortBy('first_name');
                if ($orderOptions == 'desc') {
                    $employees = $employees->reverse();
                }
            } elseif ($nameSort == 'last_name') {
                $employees = $employees->sortBy('last_name');
                if ($orderOptions == 'desc') {
                    $employees = $employees->reverse();
                }
            }
        }

        if ($request->input('list_mode')) {
            return view('employee.ajax.employee_list', compact('employees'))->render();
        } else {
            return view('employee.ajax.employee_grid', compact('employees'))->render();
        }
    }
}
