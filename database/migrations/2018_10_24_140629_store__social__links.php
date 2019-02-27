<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreSocialLinks extends Migration{
    function up(){
        Schema::create('tbl_store_social_links', function (Blueprint $column){
            $column->increments('id');
            $column->integer('user_id');
            $column->string('facebook', 100)->nullable();
            $column->string('twitter', 100)->nullable();
            $column->string('googleplus', 100)->nullable();
        });
    }

    function down(){
        Schema::dropIfExist('tbl_store_social_links');
    }
}
