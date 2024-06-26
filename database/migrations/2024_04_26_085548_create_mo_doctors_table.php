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
            $table->integer('user_id')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('profile')->nullable();
            $table->string('doctor_email')->nullable();
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
            $table->bigInteger('from_fees')->nullable();
            $table->bigInteger('to_fees')->nullable();
            $table->softDeletes();
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
