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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("doctor_id")->nullable();
            $table->unsignedBigInteger("patient_id")->nullable();
            $table->unsignedBigInteger("hospital_id")->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phno')->unique();
            $table->string('google_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('type')->default('patient');
            $table->string('level')->default(2);
            $table->string('profile')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
