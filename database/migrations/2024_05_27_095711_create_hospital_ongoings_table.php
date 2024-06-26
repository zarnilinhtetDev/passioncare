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
        Schema::create('hospital_ongoings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string("doctor_name")->nullable();
            $table->string("patient_name")->nullable();
            $table->string("phno")->nullable();
            $table->string("hospital_names")->nullable();
            $table->date("appointment_date")->nullable();
            $table->string("mo_remark")->nullable();
            $table->string("ticket_stage")->nullable();
            $table->string("called")->default("no");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_ongoings');
    }
};
