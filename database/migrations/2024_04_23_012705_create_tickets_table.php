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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('mo_id');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('conservation_id')->nullable();
            $table->string("appointment")->nullable();
            $table->string("patient_name")->nullable();
            $table->string("patient_phno")->nullable();
            $table->string("patient_complaint")->nullable();
            $table->string("ticket_stage")->nullable();
            $table->string("called")->default("no");
            $table->string("assigned")->default("no");
            // $table->string('waiting_time')->nullable();
            // $table->string('waiting_qty')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
