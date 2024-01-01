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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->bigInteger('school_id')->nullable(false);
            $table->bigInteger('student_id')->nulllable(false);

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('student_id')->references('id')->on('students');

            $table->primary(['school_id','student_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
