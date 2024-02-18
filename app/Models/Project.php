<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="projects";
    protected $fillable = [
        'project_name',
        'client_name',
        'project_mananger',
        'department_name',
        'team_leader',
        'number_of_employee',
        'project_duration',
        'status_by_emp',
        'status_by_team_leader',
        'status_by_project_manager'
    ];
}
