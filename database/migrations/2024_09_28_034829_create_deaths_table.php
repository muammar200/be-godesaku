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
        Schema::create('deaths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_pupulation_id')->constrained('master_populations');
            $table->string('pod')->nullable();
            $table->string('village')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->date('dod')->nullable();
            $table->time('tod')->nullable();
            $table->foreignId('time_id')->constrained('times'); //buat nullable
            $table->integer('age')->nullable();
            $table->string('death_certificate_number')->nullable();
            $table->string('death_certificate_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deaths');
    }
};
