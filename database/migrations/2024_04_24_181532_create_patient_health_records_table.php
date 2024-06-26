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
        Schema::create('patient_health_records', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->nullable();
            $table->string('booking_no')->nullable();
            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->string('date')->nullable();
            $table->string('waiting_time')->nullable();
            $table->string('waiting_qty')->nullable();
            $table->string('ticket_created')->default("no");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_health_records');
    }
};
