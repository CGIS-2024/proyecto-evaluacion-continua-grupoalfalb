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
        Schema::create('categoria_platos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('nombre', ['Primer Plato', 'Segundo Plato', 'Postre']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_platos');
    }
};
