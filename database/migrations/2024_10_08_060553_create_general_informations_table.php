<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('general_informations', function (Blueprint $table) {
            $table->id();
            $table->string('village_name')->nullable();
            $table->string('subdistrict_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('province_name')->nullable();
            $table->string('latitude_coordinates')->nullable();
            $table->string('longitude_coordinates')->nullable();
            $table->text('profile_summary')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('history')->nullable();
            $table->string('village_logo')->nullable();
            $table->string('government_structure')->nullable();
            $table->string('organization_structure')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_informations');
    }
};
