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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orphan_id')->constrained()->cascadeOnDelete();

            // بيانات الوصي
            $table->string('guardian_name');
            $table->string('guardian_national_id');
            $table->string('guardian_relationship');
            $table->string('guardianship_reason')->nullable();

            // بيانات البحث
            $table->text('internal_research');
            $table->date('research_date');
            $table->text('notes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
