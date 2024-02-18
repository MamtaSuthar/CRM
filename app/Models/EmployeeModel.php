<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table ='employe';

    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'address',
        'position',
        'password'
    ];
   
}
