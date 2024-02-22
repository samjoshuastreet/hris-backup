<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'id',
        'department_name',
        'description',
        'location',
        'contact_number',
        'email_address',
        'number_of_employees',
        'status'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function get_employees()
    {
        $employeeIds = Employee::pluck('id')->toArray();
        return $employeeIds;
    }
}
