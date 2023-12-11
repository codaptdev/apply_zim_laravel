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
        Schema::create('schools', function (Blueprint $table) {
            $table->integer('id')->nullable(false);
            $table->integer('year_established');
            $table->foreign('id')->references('id')->on('users');
            $table->string('name')->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('town_city');
            $table->string('address');
            $table->string('logo_url')->nullable(true);
            $table->enum('level', ['PRIMARY', 'SECONDARY', 'TERTIARY']);
            $table->text('about')->nullable();
            $table->text('body')->nullable();
            $table->text('website_url')->nullable();
            $table->text('application_url')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('facebook')->nullable();
            $table->text('banner_url')->nullable();
            $table->text('application_process')->nullable();
            $table->integer('tuition_max')->unsigned()->nullable();
            $table->integer('tuition_min')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
