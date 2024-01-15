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
        Schema::create('redirect_logs', function (Blueprint $table) {
            $table->id();

            // The school that the redirect is associated with
            $table->integer('school_id');

            // e.g the type can be  instagram, facebook, website
            $table->string('type');

            // The destination of the redirect
            $table->string('to');
            
            $table->foreign('school_id')->references('schools')->on('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redirect_logs');
    }
};
