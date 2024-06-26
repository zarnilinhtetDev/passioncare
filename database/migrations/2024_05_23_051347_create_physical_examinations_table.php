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
        Schema::create('physical_examinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('ticket_id');
            $table->string('temperature')->nullable();
            $table->string('blood_pressure_sbp')->nullable();
            $table->string('blood_pressure_dbp')->nullable();
            $table->string('heart_rate_hr')->nullable();
            $table->string('heart_rate_spo2')->nullable();
            $table->string('general_apperance')->nullable();
            $table->string('specific_findings')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_examinations');
    }
};
