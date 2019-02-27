<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderInvoices extends Migration{
    function up(){
        Schema::create('tbl_order_invoices', function (Blueprint $column){
            $column->increments('id');
            $column->integer('order_id')->unique();
            $column->LongText('payer_id');
            $column->LongText('transaction_id');
            $column->LongText('total');
            $column->string('status');//
        });
    }

    function down(){
        Schema::dropIfExist('tbl_order_invoices');
    }
}