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
        Schema::create('orphans', function (Blueprint $table) {
            $table->id();
            $table->enum('status' ,
            // 'pending_approval'
                    ['registered' , 'under_review' , 'rejected'  , 'approved' , 'marketing_provider' ,'waiting' , 'sponsored' , 'archived'])->default('registered');
            $table->string('internal_code')->unique();
            $table->string('application_form');
            $table->string('name');
            $table->string('national_id')->unique();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('gender' , ['ذكر' , 'أنثى']);
            $table->integer('age');
            $table->integer('visa_number');
            $table->string('bank_name');
            $table->enum('case_type' , ['يتيم الأبوين' , 'مريض مزمن' ,'حالات خاصة' , 'قريب السن']);
            $table->string('health_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orphans');
    }
};
