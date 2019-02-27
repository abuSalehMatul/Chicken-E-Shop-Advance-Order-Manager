<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreSettings extends Migration{
    function up(){
        Schema::create('tbl_store_settings', function (Blueprint $column){
            $column->increments('id');
            $column->integer('user_id');
            $column->string('owner_name')->nullable()->unique();
            $column->string('store_name')->nullable();
            $column->string('store_address', 100)->nullable()->unique();
            $column->string('country_id', 5)->nullable();
            $column->string('city_id', 5)->nullable();
            $column->integer('zip_code')->nullable();
            $column->string('country_code_1', 6)->nullable();
            $column->string('cell_number1', 10)->unique()->nullable();
            $column->string('country_code_2', 6)->nullable();
            $column->string('cell_number2', 10)->unique()->nullable();
            $column->string('email1', 50)->unique()->nullable();
            $column->string('email2', 50)->unique()->nullable();
            $column->date('created_date');
            $column->Time('created_time');
        });
    }

    function down(){
        Schema::dropIfExist('tbl_store_settings');
    }
}
