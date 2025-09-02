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
        Schema::create('expense_orphans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_id')->nullable()->constrained()->nullOnDelete();
            $table->string('internal_code');
            $table->string('external_code');
            $table->string('orphan');
            $table->integer('visa_number');
            $table->string('bank_name');
            $table->string('guardian_name');
            $table->string('guardian_national_id');
            $table->integer('orphan_number')->nullable();
            $table->text('notes')->nullable();
            $table->integer('month_number');
            $table->integer('total');
            $table->integer('orphan_paid_monthly');
            $table->string('administrative_ratio');
            $table->string('net_amount');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_orphans');
    }
};
