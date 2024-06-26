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
        Schema::create('physical_examination_finding2s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('ticket_id');
            $table->string('abdomen')->nullable();
            $table->string('liver')->nullable();
            $table->string('spleen')->nullable();
            $table->string('hernia')->nullable();
            $table->string('others')->nullable();
            $table->string('kidneys')->nullable();
            $table->string('genitalia')->nullable();
            $table->string('skull')->nullable();
            $table->string('spine')->nullable();
            $table->string('extremities_upper')->nullable();
            $table->string('extremities_lower')->nullable();
            $table->string('motor')->nullable();
            $table->string('sensory')->nullable();
            $table->string('reflexes')->nullable();
            $table->string('cxr')->nullable();
            $table->string('ecg')->nullable();
            $table->string('usg_pelvis_abdomen')->nullable();
            $table->string('usg_breast')->nullable();
            $table->string('pap_semer')->nullable();
            $table->string('bone_scan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_examination_finding2s');
    }
};
