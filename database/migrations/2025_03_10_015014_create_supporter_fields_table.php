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
        // الحقول وانواعها التي يحتاجها كل داعم من معلومات اليتيم
        //كل داعم يحتاج معلومات مختلفة
        Schema::create('Supporter_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supporter_id')->constrained()->cascadeOnDelete();
            $table->string('field_name');
            $table->string('field_type');
            $table->string('database_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporter_fields');
    }
};
