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
        Schema::create('posts_blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_name');
            $table->string('role')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->enum('category',['Mental health','Exercise','Education','Social','General'])->default('General');
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('URL1')->nullable();
            $table->string('URL2')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('posts_blogs');
    }
};
