<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');        
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('seo_title')->nullable();           
            $table->text('body')->nullable();
            $table->string('image_url')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('type')->nullable();
            $table->string('visiblity')->default('public')->nullable();
            $table->enum('status', ['published', 'draft' ,'trashed'])->default('Draft');
            $table->boolean('featured')->default(0);
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
