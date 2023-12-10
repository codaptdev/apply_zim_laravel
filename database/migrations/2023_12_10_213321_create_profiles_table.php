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
        Schema::create('profiles', function (Blueprint $table) {
            $table->integer('school_id')->unique();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->text('about')->nullable();
            $table->text('body')->nullable();
            $table->text('website_url')->nullable();
            $table->text('application_url')->nullable(false);
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('facebook')->nullable();
            $table->text('banner_url')->nullable();
            $table->text('application_process')->nullable();
            $table->integer('tuition_max')->unsigned()->nullable(false);
            $table->integer('tuition_min')->unsigned()->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
