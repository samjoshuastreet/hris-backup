<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
            'description' => 'required|min:20|max:225',
            'location' => 'nullable',
            'contact_number' => 'required|max:13',
            'email_address' => 'required|email|unique:departments',
            'number_of_employees' => 'required',
            'department_status' => 'required|in:Active,Inactive,Pending Restructuring,Pending Budget Approval,On Hold'
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        } else {
            try {
                $department = Department::create([
                    'department_name' => $request->input('department_name'),
                    'description' => $request->input('description'),
                    'location' => $request->input('location'),
                    'contact_number' => $request->input('contact_number'),
                    'email_address' => $request->input('email_address'),
                    'number_of_employees' => $request->input('number_of_employees'),
                    'status' => $request->input('department_status'),
                ]);
                return response()->json(['success' => true, 'msg' => 'Department created successfully!']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'msg' => $e->getMessage()]);
            }
        }
    }

    public function render_list(Request $request)
    {
        $departments = Department::all();
        return view('departments.ajax.department_list', compact('departments'))->render();
    }

    public function view_department($id)
    {
        $departments = Department::all();
        $department = Department::find($id);
        return view('departments.department_viewer', compact('department', 'departments'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ], 422);
        }

        $dept = new Department;
        $dept->department_name = $request->input('department_name');
        $dept->save();

        session()->flash('success', "SUCCESS");
        return redirect('/department');
    }

    public function update(Request $request)
    {
        $target = Department::find($request->input('id'));
        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
            'description' => 'required|min:20|max:225',
            'location' => 'nullable|string',
            'contact_number' => 'required|max:13',
            'number_of_employees' => 'required',
            'email_address' => 'required|email|unique:departments,email_address,' . $target->id,
            'department_status' => 'required|in:Active,Inactive,Pending Restructuring,Pending Budget Approval,On Hold'
        ]);
        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        } else {
            try {
                $target->department_name = $request->input('department_name');
                $target->description = $request->input('description');
                $target->location = $request->input('location');
                $target->contact_number = $request->input('contact_number');
                $target->email_address = $request->input('email_address');
                $target->number_of_employees = $request->input('number_of_employees');
                $target->status = $request->input('department_status');
                $target->save();
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'msg' => $e->getMessage()]);
            }
        }
    }

    public function delete_record($id)
    {
        try {
            $target = Department::findOrFail($id);
            if ($target->employees()->exists()) {
                return response()->json(['success' => false, 'delete_fail' => 'Cannot delete department with associated employees.']);
            }
            $target_name = $target->department_name;
            $message = $target_name . ' Deleted Successfully!';
            $target->delete();
            return response()->json(['success' => true, 'delete_scs' => $message]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'delete_fail' => $e->getMessage()]);
        }
    }
}
