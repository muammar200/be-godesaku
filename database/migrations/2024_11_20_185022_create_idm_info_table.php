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
        Schema::create('idm_info', function (Blueprint $table) {
            $table->id();

            $table->year('year')->unique();
            $table->string('status', 50)->nullable();
            $table->integer('total_score')->nullable();
            $table->string('target_status', 50)->nullable();
            $table->integer('minimum_score')->nullable();
            $table->integer('increment')->nullable();
            $table->decimal('iks_score', 10, 4)->nullable();
            $table->decimal('ike_score', 10, 4)->nullable();
            $table->decimal('ikl_score', 10, 4)->nullable();

            $table->string('status_icon', 100)->nullable();
            $table->string('total_score_icon', 100)->nullable();
            $table->string('target_status_icon', 100)->nullable();
            $table->string('minimum_score_icon', 100)->nullable();
            $table->string('increment_icon', 100)->nullable();
            $table->string('iks_score_icon', 100)->nullable();
            $table->string('ike_score_icon', 100)->nullable();
            $table->string('ikl_score_icon', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idm_info');
    }
};
