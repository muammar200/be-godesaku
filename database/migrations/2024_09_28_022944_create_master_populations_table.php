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
        Schema::create('master_populations', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('full_name');
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('religion_id')->constrained('religions');
            $table->foreignId('blood_type_id')->constrained('blood_types');
            $table->foreignId('education_id')->constrained('educations');
            $table->foreignId('profession_id')->constrained('professions');
            $table->string('phone_number')->nullable();
            $table->string('home_address');
            $table->string('house_number');
            $table->string('rt'); 
            $table->string('rw');
            $table->foreignId('dusun_id')->constrained('dusuns'); 
            $table->foreignId('can_read_id')->nullable()->constrained('can_reads');
            $table->foreignId('civic_id')->constrained('civics'); 
            $table->string('nationality');
            $table->foreignId('entry_type_id')->constrained('entry_types');
            $table->foreignId('exit_type_id')->constrained('exit_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_populations');
    }
};
