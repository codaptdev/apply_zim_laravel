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
        Schema::create('students', function (Blueprint $table) {

            // Reference to the user account that created the student
            $table->integer('user_id')->nullable(false)->unique();
            $table->foreign('user_id')->references('id')->on('users');

            // Primary key for the student table
            $table->id('student_id');

            $table->string('first_name');
            $table->string('surname');
            $table->string('email')->unique()->nullable(false);
            $table->string('town_city');
            $table->enum('level', ['PRIMARY', 'SECONDARY', 'TERTIARY']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
