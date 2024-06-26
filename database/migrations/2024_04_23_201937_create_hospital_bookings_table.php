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
        Schema::create('hospital_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_no')->nullable();
            $table->integer('patient_id')->nullable();
            $table->string('name')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('hospital_address')->nullable();
            $table->string('hospital_google_address_link')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('specilist')->nullable();
            $table->string('description')->nullable();
            $table->string('chief_complaint')->nullable();
            $table->string('date')->nullable();
            $table->string('token_no')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_bookings');
    }
};
