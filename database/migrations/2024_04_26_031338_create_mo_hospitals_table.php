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
        Schema::create('mo_hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name')->nullable();
            $table->string('hospital_type')->nullable();
            $table->string('hospital_br_number')->nullable();
            $table->string('hospital_address')->nullable();
            $table->string('hospital_phone_number')->nullable();
            $table->string('hospital_email')->nullable();
            $table->string('hospital_google_address_link')->nullable();
            $table->integer('bed_capacity')->nullable();
            $table->string('facility_and_services')->nullable();
            $table->string('specialities')->nullable();
            $table->integer('number_of_physicians')->nullable();
            $table->integer('number_of_nurses')->nullable();
            $table->string('other_staff')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_services')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mo_hospitals');
    }
};
