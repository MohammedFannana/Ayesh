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
        Schema::create('certified_orphan_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orphan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('volunteer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('supporter_id')->nullable()->constrained()->nullOnDelete();

            $table->string('country');
            $table->string('city');
            // $table->string('responsible_supporter');
            $table->longText('description_orphan_condition');
            $table->string('father_card');
            $table->string('school_enrollment');
            $table->string('health_insurance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certified_orphan_extras');
    }
};
