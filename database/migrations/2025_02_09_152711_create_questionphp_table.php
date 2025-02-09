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
        Schema::create('question_php', function (Blueprint $table) {
            $table->id('question_id');
            $table->unsignedBigInteger('test_id');
            $table->string('question_text');

            $table->foreign('test_id')->references('test_id')->on('tests_php');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_php');
    }
};
