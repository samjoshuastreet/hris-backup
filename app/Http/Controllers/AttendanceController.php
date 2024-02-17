<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('attendance.index', compact('departments'));
    }
}
