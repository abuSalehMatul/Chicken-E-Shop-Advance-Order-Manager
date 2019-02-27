<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsSEOOptions extends Migration{
    function up(){
        Schema::create('tbl_products_seo_options', function (Blueprint $column){
            $column->increments('id');
            $column->integer('user_id');
            $column->integer('product_id');
            $column->longText('meta_keywords');
            $column->longText('meta_description');
        });
    }

    function down(){
        Schema::dropIfExist('tbl_products_seo_options');
    }
}
