<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

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
}
