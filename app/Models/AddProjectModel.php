<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddProjectModel extends Model
{
    use HasFactory;
    protected $table='addproject';

    protected $fillable=[
        'project_name',
        'client_id',
        'project_type',
        'start_date',
        'deadline',
        'project_description',
        
    ];
}
