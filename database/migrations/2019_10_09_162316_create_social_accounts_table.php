<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('google_id')->nullable();
            $table->string('google_token')->nullable();
            $table->string('google_avatar_url')->nullable();

            $table->string('facebook_id')->nullable();
            $table->string('facebook_token')->nullable();
            $table->string('facebook_avatar_url')->nullable();

            $table->string('twitter_id')->nullable();
            $table->string('twitter_token')->nullable();
            $table->string('twitter_avatar_url')->nullable();

            $table->string('instagram_id')->nullable();
            $table->string('instagram_token')->nullable();
            $table->string('instagram_avatar_url')->nullable();

            $table->string('github_id')->nullable();
            $table->string('github_token')->nullable();
            $table->string('github_avatar_url')->nullable();

            $table->string('linkedin_id')->nullable();
            $table->string('linkedin_token')->nullable();
            $table->string('linkedin_avatar_url')->nullable();

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
        Schema::dropIfExists('social_accounts');
    }
}
