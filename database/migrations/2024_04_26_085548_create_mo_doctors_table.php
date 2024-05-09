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
        Schema::create('mo_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name')->nullable();
            $table->string('medical_license')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('degree')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('doctor_specialities')->nullable();
            $table->string('gender')->nullable();
            $table->string('work_experiance')->nullable();
            $table->string('city')->nullable();
            $table->string('other_certification')->nullable();
            $table->string('address')->nullable();
            $table->string('from_fees')->nullable();
            $table->string('to_fees')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mo_doctors');
    }
};
