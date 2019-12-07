<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable()->default(0); 
            $table->string('domain')->nullable();
            $table->string('type')->nullable();
            $table->string('label')->nullable();
            $table->enum('status', ['unread', 'read'])->default('unread');
            $table->boolean('starred')->default(0);
            $table->string('sender')->nullable();
            $table->string('recipient')->nullable();
            $table->string('from')->nullable();
            $table->text('to')->nullable();
            $table->text('cc')->nullable();
            $table->text('bcc')->nullable();
            $table->text('subject')->nullable();
            $table->longText('body_plain')->nullable();
            $table->longText('body_html')->nullable();
            $table->binary('body')->nullable();
            $table->boolean('attachment')->default(0);
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
