<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index(Department $department){
        $department = Department::orderBy('id','DESC')->paginate(10);
        return view('department.index',compact('department'));
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

}
