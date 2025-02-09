<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('result_php', function (Blueprint $table) {
            $table->id('result_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('score');
            $table->timestampTz('time_finished');

            $table->foreign('test_id')->references('test_id')->on('tests_php');
            $table->foreign('user_id')->references('user_id')->on('users_php');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_php');
    }
};
