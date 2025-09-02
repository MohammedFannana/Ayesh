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
        Schema::create('albar_follow_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follow_report_data_id')->constrained('follow_report_datas')->onDelete('cascade');
            $table->string('orphan_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albar_follow_reports');
    }
};
