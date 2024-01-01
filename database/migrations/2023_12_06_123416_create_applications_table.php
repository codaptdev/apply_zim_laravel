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
        Schema::create('applications', function (Blueprint $table) {
            $table->integer('student_id')->nullable(false);
            $table->integer('school_id')->nullable(false);

            // Reference to the student making the application
            $table->foreign('student_id')->references('id')->on('students');

            // Reference to the school that the student is applying to
            $table->foreign('school_id')->references('id')->on('schools');

            $table->primary(['school_id', 'student_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
