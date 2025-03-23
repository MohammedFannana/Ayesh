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
        Schema::create('first_line_families', function (Blueprint $table) {
            $table->id();
            $table->string('families_number');
            $table->string('authority_number');
            $table->string('authority_name');
            $table->string('country');
            $table->string('city');
            $table->enum('parents_status' , ['مطلقة' , 'أرملة' , 'سجين' , 'مريض' , 'فقير']);
            $table->string('name');
            $table->string('nationality');
            $table->string('birth_date');
            $table->string('marital_status');
            $table->integer('family_number');
            $table->integer('family_male_number');
            $table->integer('family_female_number');
            $table->string('income');
            $table->string('income_source');
            $table->string('subsidies');
            $table->enum('financial_status' , ['فقير' , 'غني']);
            $table->string('birth');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('first_line_families');
    }
};
