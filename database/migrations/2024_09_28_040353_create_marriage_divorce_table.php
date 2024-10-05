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
        Schema::create('marriage_divorce', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_population_id')->constrained('master_populations');
            $table->foreignId('marital_status_id')->constrained('marital_statuses');
            $table->string('marriage_certificate_number')->nullable();
            $table->string('marriage_date')->nullable();
            $table->string('marriage_place')->nullable();
            $table->string('divorce_certificate_number')->nullable();
            $table->string('divorce_date')->nullable();
            $table->string('divorce_place')->nullable();
            $table->timestamps();

            $table->unique('master_population_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriage_divorce');
    }
};
