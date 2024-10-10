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
        Schema::create('farm_produces', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('quantity', 10, 2);
            $table->string('icon')->nullable();
            $table->foreignId('production_level_id')->constrained('production_levels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_produces');
    }
};
