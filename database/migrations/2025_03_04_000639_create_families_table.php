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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orphan_id')->constrained()->cascadeOnDelete();

            $table->integer('family_number')->default(0);
            $table->integer('male_number')->default(0);
            $table->integer('female_number')->default(0);
            $table->string('income');
            $table->string('income_source');
            // $table->string('address');

            // بيانات السكن
            $table->enum('housing_type', ['ملك', 'ايجار', 'مشترك']);
            $table->enum('housing_case', ['جيد', 'متوسط', 'سيء']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
