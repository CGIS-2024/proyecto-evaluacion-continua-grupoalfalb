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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('alergias_alimentarias')->nullable();
            $table->string('preferencias_alimentarias')->nullable();
            $table->string('motivo_hospitalizacion');
            $table->string('nuhsa');
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->foreignId('dietista_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
