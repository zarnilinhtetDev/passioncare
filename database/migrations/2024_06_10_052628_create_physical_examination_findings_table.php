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
        Schema::create('physical_examination_findings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('ticket_id');
            $table->string('visual_r')->nullable();
            $table->string('visual_l')->nullable();
            $table->string('visual_pupil_equal')->nullable();
            $table->string('color_r')->nullable();
            $table->string('color_l')->nullable();
            $table->string('color_regular')->nullable();
            $table->string('hearing_left')->nullable();
            $table->string('hearing_right')->nullable();
            $table->string('nose')->nullable();
            $table->string('neck')->nullable();
            $table->string('thyroid')->nullable();
            $table->string('teeth_gums')->nullable();
            $table->string('tongue_pharynx')->nullable();
            $table->string('tonsils')->nullable();
            $table->string('cardiovasular_pulse')->nullable();
            $table->string('cardiovasular_rhythm')->nullable();
            $table->string('cardiovasular_apex_beat')->nullable();
            $table->string('cardiovasular_asculation')->nullable();
            $table->string('cardiovasular_varicose_veins')->nullable();
            $table->string('respiratory_lungs_r')->nullable();
            $table->string('respiratory_lungs_l')->nullable();
            $table->string('respiratory_breasts')->nullable();
            $table->string('lung_fvc')->nullable();
            $table->string('lung_fev1')->nullable();
            $table->string('lung_fev1_fvc')->nullable();
            $table->string('remark')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_examination_findings');
    }
};
