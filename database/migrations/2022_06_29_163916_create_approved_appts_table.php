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
        Schema::create('approved_appts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('user_name');
            $table->string('therapist_id');
            $table->string('therapist_name');
            $table->string('lname');
            $table->longText('issue');
            $table->string('date');
            $table->string('time_in');
            $table->string('time_out');
            $table->string('approval_status');
            $table->string('location')->nullable;
            $table->longText('diagnosis')->nullable();
            $table->longText('prescription');
            $table->enum('completed',['Yes','Cancelled','pending'])->default('pending');
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
        Schema::dropIfExists('approved_appts');
    }
};
