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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orphan_id')->constrained()->cascadeOnDelete();

            $table->date('father_death_date')->nullable();
            $table->date('mother_death_date')->nullable();
            // $table->enum('parents_orphan', ['نعم', 'لا']);
            $table->string('mother_name');
            $table->string('mother_national_id');
            $table->enum('mother_work', ['نعم', 'لا'])->nullable();;
            $table->enum('mother_status', ['أرملة' , 'متزوجة'])->nullable();


            // بيانات الدراسة
            $table->enum('academic_stage' , ['تحت السن','عام','أزهري','غير مقيد(خارج التعليم)']);
            $table->enum('academic_stage_details', ['روضة','ابتدائي','إعدادي','ثانوي'])->nullable();
            $table->enum('academic_secondary_details' , ['ثانوي عام','تجاري','صناعي','زراعي','تمريض'])->nullable();
            $table->enum('reason_not_registering' , ['مريض','معاق','أخرى'])->nullable();
            $table->text('other_reason_not_registering')->nullable();
            $table->enum('class' , ['الأول','الثاني','الثالث','الرابع','الخامس','السادس']);


            //
            // $table->string('phone');
            $table->string('full_address');
            // $table->string('governorate');
            // $table->string('center');
            // $table->string('recipient_name');
            $table->string('registrar_name');
            $table->date('registrar_date');
            // $table->string('knowledge');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
