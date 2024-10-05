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
        Schema::create('blood_types', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            }
        );

        Schema::create('genders', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            }
        );

        Schema::create('religions', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            }
        );

        Schema::create('educations', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            }
        );

        Schema::create('professions', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            }
        );

        Schema::create('dusuns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('civics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('entry_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('exit_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('can_reads',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            }
        );
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_types');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('religions');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('professions');
        Schema::dropIfExists('dusuns');
        Schema::dropIfExists('civics');
        Schema::dropIfExists('entry_types');
        Schema::dropIfExists('exit_types');
        Schema::dropIfExists('can_reads');
    }
};
