<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addproject', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name')->nullable();
            $table->string('client_id')->nullable();
            $table->string('project_type')->nullable();
            $table->string('start_date')->nullable();
            $table->string('deadline')->nullable();
            $table->string('project_description')->nullable();
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
        Schema::dropIfExists('addproject');
    }
}
