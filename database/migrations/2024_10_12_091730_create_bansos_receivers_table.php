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
        Schema::create('bansos_receivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_population_id')->constrained('master_populations');
            $table->foreignId('bansos_id')->constrained('bansos');
            $table->string('description')->nullable();
            $table->string('amount')->nullable();
            $table->date('period')->nullable();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos_receivers');
    }
};
