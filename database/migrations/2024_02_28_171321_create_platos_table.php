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
        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //$table->softDeletes();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('ingredientes');
            $table->double('peso');
            $table->double('calorias');
            $table->double('proteinas');
            $table->double('grasas');
            $table->double('carbohidratos');
            $table->double('fibra');
            $table->double('azucares');
            $table->string('alergenos'); //tambien lo pondremos para elegir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos');
    }
};
