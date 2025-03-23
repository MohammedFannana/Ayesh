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
        Schema::create('first_line_family_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_line_family_id')->constrained()->cascadeOnDelete();
            $table->string('family_city');
            $table->string('family_directorate');
            $table->string('family_village');
            $table->string('family_neighborhood');
            $table->string('landmark');
            $table->enum('housing_status' , ['ملك' , 'ايجار' , 'مشترك']);
            $table->string('search_status');
            $table->string('researcher_name');
            $table->string('signature');
            $table->string('phone');
            $table->string('supporting_documents');
            $table->string('authority_official');
            $table->string('authority_official_signature');
            $table->string('birth_certificate');
            $table->string('death_certificate');
            $table->date('date');
            $table->string('sponsor_number');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('first_line_familie_profiles');
    }
};
