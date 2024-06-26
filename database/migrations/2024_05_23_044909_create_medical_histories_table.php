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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('ticket_id');
            $table->string('hospital_name')->nullable();
            $table->string('treatment_date')->nullable();
            $table->string('hospitalization_length')->nullable();
            $table->string('hospitalization_reason')->nullable();
            $table->string('other')->nullable();
            $table->string('past_medical_history')->nullable();
            $table->string('tobacco_consumption')->nullable();
            $table->string('alcohol_consumption')->nullable();
            $table->string('betel_consumption')->nullable();
            $table->string('document')->nullable();
            $table->string('drug')->nullable();
            $table->string('current_medication')->nullable();
            $table->string('history_hospital_name')->nullable();
            $table->string('history_treatment_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
