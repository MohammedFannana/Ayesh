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
        //هذا الجدول بيحتوي على قيم الحقول التي يحتاجها كل داعم
        Schema::create('orphan_supporter_field_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orphan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('supporter_field_id')->constrained()->cascadeOnDelete();
            $table->text('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orphan_supporter_field_values');
    }
};
