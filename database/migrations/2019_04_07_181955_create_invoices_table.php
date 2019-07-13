<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('tax');
            $table->integer('discount');
            $table->integer('bill_amount');
            $table->integer('net_bill_amount');
            $table->date('bill_date')->nullable();           
            $table->date('due_date')->nullable();
            $table->enum('bill_status', ['paid', 'pending'])->default('pending');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
