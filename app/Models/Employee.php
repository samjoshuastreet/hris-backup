<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

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
}
