<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductCategories extends Migration{
    function up(){
        Schema::create('tbl_product_categories', function (Blueprint $column){
            $column->increments('id');
            $column->integer('user_id');
            $column->integer('product_id');
            $column->integer('category_id')->nullable();
        });
    }

    function down(){
        Schema::dropIfExist('tbl_product_categories');
    }
}
