<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->unsignedBigInteger('salary_from')->nullable(true);
            $table->unsignedBigInteger('salary_to')->nullable(true);
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('company_id');
            $table->json('criteria')->nullable(true);
            $table->json('responsibility')->nullable(true);
            $table->json('requirement')->nullable(true);
            $table->json('condition')->nullable(true);
            $table->json('skill')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
