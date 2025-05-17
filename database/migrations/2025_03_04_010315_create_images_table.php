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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orphan_id')->constrained()->cascadeOnDelete();
            $table->string('birth_certificate');
            $table->string('father_death_certificate');
            $table->string('mother_death_certificate')->nullable();
            $table->string('mother_card');
            $table->string('orphan_image_4_6');
            $table->string('orphan_image_9_12');
            $table->string('school_benefit');
            $table->string('medical_report');
            $table->string('social_research');
            $table->string('guardianship_decision');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
