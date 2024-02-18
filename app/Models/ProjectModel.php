<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;
    protected $table='project';

    protected $fillable=[
        'project_name',
        'client_name',
        'client_email',
        'date',
        'project_type',
       
    ];
  
}
