<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date');
            $table->enum('mail_type', ['received', 'sent' ,'draft'])->nullable();
            $table->enum('mail_status', ['unread', 'read'])->nullable();
            $table->string('domain')->nullable();
            $table->string('sender');
            $table->string('recipient');
            $table->string('from');
            $table->string('to');
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
            $table->string('subject')->nullable();
            $table->text('body_plain')->nullable();
            $table->text('bodt_html')->nullable();
            $table->binary('body')->nullable();
            $table->boolean('attachment')->default(0);
            $table->integer('attempts')->default(0);
            $table->boolean('sending')->default(0);
            $table->boolean('failed')->default(0);
            $table->text('error')->nullable();
            $table->boolean('encrypted')->default(0);
            $table->timestamp('scheduled_at')->nullable();
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
        Schema::dropIfExists('mailboxes');
    }
}
