<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration{
    function up(){
        Schema::create('tbl_products', function (Blueprint $column){
            $column->increments('id');
            $column->integer('user_id');
            $column->string('featured_image', 50)->nullable();
            $column->string('name')->unique()->nullable();
            $column->string('slug')->unique()->nullable();
            $column->string('variation')->unique()->nullable();
            $column->longText('description');
            $column->string('regural_price', 5)->nullable();
            $column->string('sale_price', 5)->nullable();
            $column->integer('on_sale')->nullable();
            $column->integer('status')->nullable();
            $column->date('created_date');
            $column->Time('created_time');
        });
    }

    function down(){
        Schema::dropIfExist('tbl_products');
    }
}
