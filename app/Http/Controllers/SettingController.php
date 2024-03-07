<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();
        return view('settings', compact('departments', 'employee'));
    }
}
