<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('follow_report_datas', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('orphan_id')->constrained()->cascadeOnDelete();
    //         $table->string('sponsor_name')->nullable();
    //         $table->string('sponsor_number')->nullable();
    //         $table->integer('age')->nullable();
    //         $table->string('academic_stage')->nullable();
    //         $table->string('class')->nullable();
    //         $table->string('guardian_relationship')->nullable();
    //         $table->integer('save_orphan_quran');
    //         $table->enum('academic_level' , ['ضعيف' ,'جيد' , 'متوسط' ,'ممتاز']);
    //         $table->enum('orphan_obligations_islam' , ['ضعيفة' ,'جيدة' , 'متوسطة' ,'ممتازة']);
    //         $table->enum('changes_orphan_year' , ['دخل دورة تدريبية لتعلم الحاسوب' ,'بدأ المرحلة الثانوية' , 'أخرى']);
    //         $table->string('other_changes_orphan_year')->nullable();
    //         $table->enum('authority_comment_guarantee' , ['تغيير إيجابي حيث حفظ ٣ أجزاء من القرأن' ,'تغيير ممتاز حيث قام بالتفوق في دراسته', 'أخرى']);
    //         $table->string('other_authority_comment_guarantee')->nullable();
    //         $table->text('orphan_message')->nullable();
    //         $table->string('orphan_image_message')->nullable();
    //         $table->string('health_status')->nullable();
    //         $table->string('gender')->nullable();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('follow_report_datas');
    // }
};
