<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChatsTable extends Migration
{
    
    public function up()
    {
       Schema::create('chats',function (Blueprint $table){
        $table->increments('id');
        $table->integer('sender_id');
        $table->integer('sender_name');
        $table->longText('message');
        $table->timestamps();
       });
    }

    
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
