<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestUserTable extends Migration
{
    public function up()
    {
        Schema::create('test_user', function(Blueprint $table){
            $table->increments('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email',100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('test_user');
    }
}
