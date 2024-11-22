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
        Schema::create('idm_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idm_indicator_category_id')->constrained('idm_indicator_categories');
            $table->year('year');
            $table->text('indicator');
            $table->integer('score')->nullable();
            $table->text('description')->nullable();
            $table->text('activity')->nullable();
            $table->decimal('grade', 10, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idm_indicators');
    }
};
