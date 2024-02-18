<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTypeModel extends Model
{
    use HasFactory;
    protected $table='project_type';
    protected $fillable=[
        'project_type',
        'project_status',
    ];
}
