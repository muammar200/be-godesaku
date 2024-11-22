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
        Schema::create('activity_implementers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idm_indicator_id')->constrained('idm_indicators');
            $table->string('pusat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kab')->nullable();
            $table->string('desa')->nullable();
            $table->string('csr')->nullable();
            $table->string('others')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_implementers');
    }
};
