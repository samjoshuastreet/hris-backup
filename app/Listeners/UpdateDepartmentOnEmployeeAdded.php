<?php

namespace App\Listeners;

use App\Models\Department;
use App\Events\EmployeeAdded;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateDepartmentOnEmployeeAdded
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmployeeAdded $event): void
    {
        $employee = $event->employee;
        $department_id = $employee->department_id;

        $department = Department::find($department_id);

        if ($department) {
            // If the current value is NULL, set it to 1; otherwise, increment by 1
            $department->increment('number_of_employees', 1, ['number_of_employees' => null]);
        } else {
            Log::error('Department not found for employee with ID ' . $employee->id);
        }
    }
}
