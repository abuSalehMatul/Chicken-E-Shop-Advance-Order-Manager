<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration{
    function up(){
        Schema::create('tbl_users', function (Blueprint $column){
            $column->increments('id');
            $column->string('first_name', 15);
            $column->string('last_name', 15)->nullable();
            $column->LongText('address');
            $column->string('cell_number1', 10)->nullable()->unique();
            $column->string('email', 50)->unique()->nullable();
            $column->string('password', 100);
            $column->integer('role');
            $column->integer('status');
            $table->timestamps();
        });
    }

    function down(){
        Schema::dropIfExist('tbl_users');
    }
}