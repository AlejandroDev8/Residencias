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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained();
            $table->string('nombre');
            $table->string('num_control');
            $table->string('email');
            $table->string('email_alt')->nullable();
            $table->string('telefono');
            $table->string('telefono_alt')->nullable();
            $table->string('nss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
