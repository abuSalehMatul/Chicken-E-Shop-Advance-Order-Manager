<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesForProducts extends Migration{
    function up(){
        Schema::create('tbl_categories_for_products', function (Blueprint $column){
            $column->increments('id');
            $column->integer('user_id');
            $column->string('parent_categories');
            $column->longText('name');
            $column->longText('slug');
            $column->longText('meta_keywords');
            $column->longText('meta_description');
            $column->integer('status');
            $column->date('created_date');
            $column->Time('created_time');
        });
    }
    
    function down(){
        Schema::dropIfExist('tbl_categories_for_products');
    }
}
