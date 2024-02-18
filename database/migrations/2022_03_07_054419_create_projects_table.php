<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name')->nullable();
            $table->string('client_name')->nullable();
            $table->string('project_mananger')->nullable();
            $table->string('department_name')->nullable();
            $table->string('team_leader')->nullable();
            $table->string('number_of_employee')->nullable();
            $table->string('project_duration')->nullable();
            $table->integer('status_by_emp')->comment("1 = Complete and 0 = UnComplete");
            $table->integer('status_by_team_leader')->comment("1 = Complete and 0 = UnComplete");
            $table->integer('status_by_project_manager')->comment("1 = Complete and 0 = UnComplete");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
  
        public function down()
        {
            Schema::dropIfExists('projects');
        }
    
}
