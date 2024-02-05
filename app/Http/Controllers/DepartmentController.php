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

    public function update(Request $request, $id) {
        
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
