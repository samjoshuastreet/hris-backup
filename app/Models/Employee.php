<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'email_address',
        'date_of_birth',
        'permanent_address',
        'current_address',
        'contact_number',
        'status',
        'department_id',
        'employee_photo'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function attendanceData()
    {
        return $this->hasMany(Attendance::class, 'employee_id')->orderBy('date', 'desc');
    }

    public function getDepartmentNameAttribute()
    {
        if ($this->relationLoaded('department')) {
            return $this->department->department_name;
        } else {
            return $this->department()->value('department_name');
        }
    }

    public function filterGender($gender, $superset = [])
    {
        if ($superset == NULL) {
            $employees = Employee::all();
        } else {
            $employees = $superset;
        }
        if ($gender == 'male') {
            $employees = $employees->where('gender', 'male');
        } elseif ($gender == 'female') {
            $employees = $employees->where('gender', 'female');
        } elseif ($gender == 'non_binary') {
            $employees = $employees->where('gender', 'non_binary');
        }

        return $employees;
    }

    public function customSort($column, $mode, $superset = [])
    {
        $allowedColumns = ['first_name', 'middle_name', 'last_name'];
        if (!in_array($column, $allowedColumns)) {
            throw new \InvalidArgumentException('Invalid column name.');
        }

        $sortMode = strtolower($mode) === 'desc' ? 'desc' : 'asc';

        $sortedValues = $this->orderBy($column, $sortMode)->pluck($column)->toArray();

        return $sortedValues;
    }
}
