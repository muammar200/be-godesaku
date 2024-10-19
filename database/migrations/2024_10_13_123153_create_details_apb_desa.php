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
        Schema::create('details_apb_desa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name_apb_desa_id')->constrained('name_apb_desa');
            $table->string('name');
            $table->decimal('amount', 15, 2);
            $table->year('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_apb_desa');
    }
};
