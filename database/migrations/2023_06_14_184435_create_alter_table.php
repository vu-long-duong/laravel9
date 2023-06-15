<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('categories_id')->references('id')->on('categories');
        });

        Schema::table('postimages', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('post');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['user_id','categories_id']);
        });

        Schema::table('postimages', function (Blueprint $table) {
            $table->dropColumn(['post_id']);
        });

    }
};
