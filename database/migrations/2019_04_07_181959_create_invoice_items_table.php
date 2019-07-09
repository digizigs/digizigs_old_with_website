<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
   
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->decimal('charge', 8, 2)->nullable();
            $table->decimal('tax', 8, 2)->nullable();
            $table->timestamps();
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade')->onUpdate('cascade');
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
}
