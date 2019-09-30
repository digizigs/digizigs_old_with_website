<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->boolean('fullday')->default(0);
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
        Schema::dropIfExists('calenders');
    }
}
