<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreImages extends Migration{
    function up(){
        Schema::create('tbl_store_images', function (Blueprint $column){
            $column->increments('id');
            $column->integer('user_id');
            $column->string('header_image', 20)->nullable();
            $column->string('footer_image', 20)->nullable();
            $column->string('favicon_image', 20)->nullable();
            $column->date('created_date');
            $column->Time('created_time');
        });
    }

    function down(){
        Schema::dropIfExist('tbl_store_images');
    }
}
