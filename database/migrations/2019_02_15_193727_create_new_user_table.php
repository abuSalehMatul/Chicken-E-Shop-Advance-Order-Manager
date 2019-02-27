<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewUserTable extends Migration
{
  
    function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 15);
            $table->string('last_name', 15)->nullable();
            $table->LongText('address');
            $table->string('cell_number1', 10)->nullable()->unique();
            $table->string('email', 50)->unique()->nullable();
            $table->string('password', 100);
            $table->integer('role');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    function down()
    {
        Schema::dropIfExist('tbl_users');
    }
}
