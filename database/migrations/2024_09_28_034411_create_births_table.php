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
        Schema::create('births', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_pupulation_id')->constrained('master_populations');
            $table->string('pob');
            $table->date('dob');
            $table->time('tob')->nullable();
            $table->foreignId('time_id')->constrained('times')->nullable();
            $table->integer('child_order');
            $table->foreignId('birth_type_id')->constrained('birth_types')->nullable();
            $table->foreignId('birth_attendant_id')->constrained('birth_attendants')->nullable();
            $table->decimal('baby_weight')->nullable();
            $table->decimal('baby_length')->nullable();
            $table->foreignId('type_of_birth_certificate_id')->constrained('type_of_birth_certificates')->nullable();
            $table->string('birth_certificate_number')->nullable();
            $table->string('birth_certificate_date')->nullable();
            $table->string('no_kk');
            $table->foreignId('family_position_id')->constrained('family_positions');
            $table->string('mother_nik')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('father_nik')->nullable();
            $table->string('father_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('births');
    }
};
