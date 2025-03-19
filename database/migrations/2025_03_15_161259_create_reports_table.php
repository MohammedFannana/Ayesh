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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('orphan_id')->constrained()->cascadeOnDelete();
            $table->string('signature')->nullable();
            $table->string('donor_seal')->nullable();
            $table->string('group_photo')->nullable();
            $table->string('thanks_letter')->nullable();
            $table->string('academic_certificate')->nullable();
            $table->string('sponsorship_transfer_receipt')->nullable();
            $table->string('donor_accreditation')->nullable();
            $table->json('fields');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
