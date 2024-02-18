<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DelStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employe', function (Blueprint $table) {
            $table->integer('del_status')->default(0);
            $table->integer('enable_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employe', function (Blueprint $table) {
            $table->dropColumn('del_status');
            $table->dropColumn('enable_status');
        });
    }
}
