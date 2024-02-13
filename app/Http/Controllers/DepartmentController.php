<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('id')->get();
        return view('departments.index', compact('departments'));
    }

    public function create(Request $request)
    {
        $department_id = $request->id;

        $department = Department::updateOrCreate(
            [
                'id' => $department_id
            ],
            [
                'department_name' => $request->department_name,
                'description' => $request->description,
                'location' => $request->location,
                'contact_number' => $request->contact_number,
                'email_address' => $request->email_address,
                'number_of_employees' => $request->number_of_employees,
                'status' => $request->status
            ]
        );
        return Response()->json(['department => $department']);
    }

    public function view_department($id)
    {
        $department = Department::find($id);
        return view('departments.department_viewer', compact('department'));
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

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400);
        }
        $dept = Department::find($id);
        $dept->department_name = $request->input('department_name');
        $dept->save();
        session()->flash('success');
        return redirect('/department');
    }

    public function delete($id)
    {
        $dept = Department::find($id);
        if (!$dept) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        $dept->update(['is_deleted' => 1]);

        session()->flash('success');
        return redirect('/department');
        // return response()->json(['message' => 'Item soft deleted successfully']);
    }
}
