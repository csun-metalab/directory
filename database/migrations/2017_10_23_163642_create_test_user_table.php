<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('test_user', function(Blueprint $table){
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email',50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('test_user');
    }
}
