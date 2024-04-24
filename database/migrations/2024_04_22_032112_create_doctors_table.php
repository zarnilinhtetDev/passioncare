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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name')->nullable();
            $table->string('doctor_specialities')->nullable();
            $table->string('doctor_experience')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('doctor_city')->nullable();
            $table->string('doctor_charges_fees_from')->nullable();
            $table->string('doctor_charges_fees_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
