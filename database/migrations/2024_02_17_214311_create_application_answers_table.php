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
        Schema::create('application_answers', function (Blueprint $table) {
            $table->id();
            $table->text('response');

            $table->integer('question_id');
            $table->foreign('question_id')->references('id')->on('application_questions');

            $table->integer('application_id');
            $table->foreign('application_id')->references('id')->on('applications');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_answers');
    }
};
