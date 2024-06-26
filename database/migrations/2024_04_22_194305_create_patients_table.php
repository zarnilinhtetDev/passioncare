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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('hospital_booking_id')->nullable();
            $table->integer('treatement_id')->nullable();
            $table->integer('mo_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phno')->nullable();
            $table->string('email')->nullable();
            $table->string('nrc')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
