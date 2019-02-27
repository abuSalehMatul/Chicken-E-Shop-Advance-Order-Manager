<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration{
    function up(){
        Schema::create('tbl_orders', function (Blueprint $column){
            $column->increments('id');
            $column->LongText('order_no');
            $column->integer('product_id');
            $column->integer('quantity');
            $column->integer('product_amount');
            $column->integer('type');
            $column->integer('payment_method');
            $column->integer('status');
            $column->date('ordered_date');
            $column->Time('ordered_time');
        });
    }

    function down(){
        Schema::dropIfExist('tbl_orders');
    }
}
