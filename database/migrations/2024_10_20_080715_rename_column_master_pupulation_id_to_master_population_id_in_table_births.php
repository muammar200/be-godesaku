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
        Schema::table('births', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['master_pupulation_id']);

            // Rename the column
            $table->renameColumn('master_pupulation_id', 'master_population_id');

            // Add the foreign key constraint again with the new column name
            $table->foreign('master_population_id')->references('id')->on('master_populations');
            // $table->foreignId('master_population_id')->constrained('master_populations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('births', function (Blueprint $table) {
        //     // Drop the foreign key for the renamed column
        //     $table->dropForeign(['master_population_id']);

        //     // Rename the column back to its original name
        //     $table->renameColumn('master_population_id', 'master_pupulation_id');

        //     // Add the original foreign key constraint back
        //     $table->foreign('master_pupulation_id')->references('id')->on('master_populations');
        //     // $table->foreignId('master_pupulation_id')->constrained('master_populations');
        // });
    }
};
