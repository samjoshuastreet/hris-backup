<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Department;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\FnStream;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();

        $today = Carbon::now()->format('Y-m-d');
        $record = $employee->attendanceData->where('date', $today)->first();
        $has_checked_in = false;
        $has_checked_out = false;
        $check_in = false;
        $check_in_expanded = false;
        $check_out_expanded = false;
        $check_out = false;
        $last_check_in = null;
        $last_check_out = null;
        $last_check_in_expanded = null;
        $last_check_out_expanded = null;
        $latest_record = null;
        $daysToCheck = 5;
        for ($i = 0; $i < $daysToCheck; $i++) {
            $dateToCheck = Carbon::yesterday()->subDays($i);

            $temp_record = Attendance::whereDate('date', $dateToCheck->toDateString())
                ->orderBy('date', 'desc')
                ->first();

            if ($temp_record) {
                $latest_record = $temp_record;
                break; // Stop the loop if a record is found for the current day
            }
        }

        if ($record) {
            $has_checked_in = true;
            $check_in = Carbon::parse($record->time_in)->format('h:i A');
            $check_in_expanded = Carbon::parse($record->time_in)->format('l, F j, Y');

            if ($record->time_out) {
                $has_checked_out = true;
                $check_out = Carbon::parse($record->time_out)->format('h:i A');
                $check_out_expanded = Carbon::parse($record->time_out)->format('l, F j, Y');
            }
        }

        if ($latest_record) {
            $last_check_in = Carbon::parse($latest_record->time_in)->format('h:i A');
            $last_check_in_expanded = Carbon::parse($latest_record->time_in)->format('l, F j, Y');
            if ($latest_record->time_out) {
                $last_check_out = Carbon::parse($latest_record->time_out)->format('h:i A');
                $last_check_out_expanded = Carbon::parse($latest_record->time_out)->format('l, F j, Y');
            }
        }
        return view('attendance.index', compact('departments', 'record', 'latest_record', 'has_checked_in', 'has_checked_out', 'last_check_in', 'last_check_in_expanded', 'last_check_out', 'last_check_out_expanded', 'user', 'check_in', 'check_in_expanded', 'check_out', 'check_out_expanded', 'employee'));
    }

    public function save_image(Request $request)
    {
        $mode = $request->input('mode');
        $imageData = $request->input('imageData');

        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();

        $today = Carbon::now()->format('Y-m-d');
        $record = $employee->attendanceData->where('date', $today)->first();

        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

        $filename = 'captured_image_' . time() . '.jpg';

        Storage::disk('public')->put('Attendance/' . $filename, $imageData);

        if ($mode == 'time_in') {
            $record->time_in_photo = $filename;
            $record->save();
            return response()->json(['success' => false]);
        }
    }

    public function load_time(Request $request)
    {
        return view('attendance.ajax.time')->render();
    }

    public function check_in(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Something went wrong.']);
        } else {
            try {
                $employee = Employee::where('user_id', $request->input('id'))->first();

                $record = new Attendance();
                $record->date = Carbon::now()->format('Y-m-d');
                $record->time_in = Carbon::now();
                $record->employee_id = $employee->id;
                $record->time_in_remark = $request->input('time_in_remark');

                $temp = $record->time_in->format('H:i:s');
                $morning_in = "08:00:00";

                if (Carbon::parse($temp)->gt(Carbon::parse($morning_in))) {
                    $record->status = "Late";
                } else {
                    $record->status = "On Time";
                }

                $record->save();
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'msg' => $e->getMessage()]);
            }
        }
        return response()->json(['success' => true]);
    }

    public function check_out(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => 'Something went wrong.']);
        } else {
            try {
                $employee = Employee::where('user_id', $request->input('id'))->first();

                $record = Attendance::where('employee_id', $employee->id)
                    ->where('date', Carbon::now()->format('Y-m-d'))
                    ->first();
                $record->time_out = Carbon::now();
                $record->time_out_remark = $request->input('time_out_remark');
                $record->save();
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'msg' => $e->getMessage()]);
            }
        }
        return response()->json(['success' => true]);
    }

    public function reload_a(Request $request)
    {
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();
        $today = Carbon::now()->format('Y-m-d');
        $record = $employee->attendanceData->where('date', $today)->first();
        $has_checked_in = false;
        $has_checked_out = false;
        $check_in = false;
        $check_in_expanded = false;
        $check_out_expanded = false;
        $check_out = false;
        $last_check_in = null;
        $last_check_out = null;
        $last_check_in_expanded = null;
        $last_check_out_expanded = null;
        $latest_record = null;
        $daysToCheck = 5;
        for ($i = 0; $i < $daysToCheck; $i++) {
            $dateToCheck = Carbon::yesterday()->subDays($i);

            $temp_record = Attendance::whereDate('date', $dateToCheck->toDateString())
                ->orderBy('date', 'desc')
                ->first();

            if ($temp_record) {
                $latest_record = $temp_record;
                break; // Stop the loop if a record is found for the current day
            }
        }

        if ($record) {
            $has_checked_in = true;
            $check_in = Carbon::parse($record->time_in)->format('h:i A');
            $check_in_expanded = Carbon::parse($record->time_in)->format('l, F j, Y');

            if ($record->time_out) {
                $has_checked_out = true;
                $check_out = Carbon::parse($record->time_out)->format('h:i A');
                $check_out_expanded = Carbon::parse($record->time_out)->format('l, F j, Y');
            }
        }

        if ($latest_record) {
            $last_check_in = Carbon::parse($latest_record->time_in)->format('h:i A');
            $last_check_in_expanded = Carbon::parse($latest_record->time_in)->format('l, F j, Y');
            if ($latest_record->time_out) {
                $last_check_out = Carbon::parse($latest_record->time_out)->format('h:i A');
                $last_check_out_expanded = Carbon::parse($latest_record->time_out)->format('l, F j, Y');
            }
        }
        return view('attendance.ajax.reload_data_a', compact('record', 'latest_record', 'has_checked_in', 'has_checked_out', 'last_check_in', 'last_check_in_expanded', 'last_check_out', 'last_check_out_expanded', 'user', 'check_in', 'check_in_expanded', 'check_out', 'check_out_expanded'))->render();
    }

    public function reload_b(Request $request)
    {
        $user = auth()->user();
        $employee = Employee::where('user_id', $user->id)->first();
        $today = Carbon::now()->format('Y-m-d');
        $record = $employee->attendanceData->where('date', $today)->first();
        $has_checked_in = false;
        $has_checked_out = false;
        $check_in = false;
        $check_in_expanded = false;
        $check_out_expanded = false;
        $check_out = false;
        $last_check_in = null;
        $last_check_out = null;
        $last_check_in_expanded = null;
        $last_check_out_expanded = null;
        $latest_record = null;
        $daysToCheck = 5;
        for ($i = 0; $i < $daysToCheck; $i++) {
            $dateToCheck = Carbon::yesterday()->subDays($i);

            $temp_record = Attendance::whereDate('date', $dateToCheck->toDateString())
                ->orderBy('date', 'desc')
                ->first();

            if ($temp_record) {
                $latest_record = $temp_record;
                break; // Stop the loop if a record is found for the current day
            }
        }

        if ($record) {
            $has_checked_in = true;
            $check_in = Carbon::parse($record->time_in)->format('h:i A');
            $check_in_expanded = Carbon::parse($record->time_in)->format('l, F j, Y');

            if ($record->time_out) {
                $has_checked_out = true;
                $check_out = Carbon::parse($record->time_out)->format('h:i A');
                $check_out_expanded = Carbon::parse($record->time_out)->format('l, F j, Y');
            }
        }

        if ($latest_record) {
            $last_check_in = Carbon::parse($latest_record->time_in)->format('h:i A');
            $last_check_in_expanded = Carbon::parse($latest_record->time_in)->format('l, F j, Y');
            if ($latest_record->time_out) {
                $last_check_out = Carbon::parse($latest_record->time_out)->format('h:i A');
                $last_check_out_expanded = Carbon::parse($latest_record->time_out)->format('l, F j, Y');
            }
        }
        return view('attendance.ajax.reload_data_b', compact('record', 'latest_record', 'has_checked_in', 'has_checked_out', 'last_check_in', 'last_check_in_expanded', 'last_check_out', 'last_check_out_expanded', 'user', 'check_in', 'check_in_expanded', 'check_out', 'check_out_expanded'))->render();
    }
}
