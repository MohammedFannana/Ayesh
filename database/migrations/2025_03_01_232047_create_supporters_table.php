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
        Schema::create('supporters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('phone');
            $table->string('fax');
            $table->string('association_name');
            $table->string('department_name');
            $table->string('administrator_name');
            $table->string('address');
            $table->string('website');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporters');
    }
};
