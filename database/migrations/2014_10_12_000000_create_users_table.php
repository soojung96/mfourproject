<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //added first name, last name, and auto increment id to schema
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');   //autoincrement id field
            $table->string('first_name');   //string field
            $table->string('last_name');   //string field
            $table->string('email')->unique();   //unique string field
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');   //string field
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
