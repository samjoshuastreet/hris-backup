<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $departments = Department::all();
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();
        return view('home', compact('departments', 'employee', 'user'));
    }

    public function render_sidebar()
    {
        $departments = Department::all();
        return view('layouts.components.sidebar', compact('departments'))->render();
    }
}
