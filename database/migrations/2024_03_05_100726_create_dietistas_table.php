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
        Schema::create('dietistas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nusha');
            $table->string('fecha_contratacion') //TODO: Cambiar a tipo datetime
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dietistas');
    }
};
