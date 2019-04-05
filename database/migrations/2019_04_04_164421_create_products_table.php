<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model');
            $table->string('type')->nullable();
            $table->integer('quantity')->nullable();        
            $table->decimal('unit_price', 8, 2)->nullable();                      
            $table->boolean('status')->default(1);           
            $table->integer('vendor_id')->nullable();
            $table->integer('product_category')->nullable();
            $table->date('sale_start_date')->nullable();
            $table->date('sale_end_date')->nullable();
            $table->text('description')->nullable();
            $table->text('comment')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
