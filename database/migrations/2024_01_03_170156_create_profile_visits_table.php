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
        Schema::create('profile_visits', function (Blueprint $table) {
            $table->id();

            // The ID of the school that is being visited
            $table->integer('school_id')->nullable(false);

            // The student_id can be null when the visiting student
            // is an unathenticated guest
            $table->integer('student_id')->nullable(true);

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('student_id')->references('id')->on('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_visits');
    }
};
