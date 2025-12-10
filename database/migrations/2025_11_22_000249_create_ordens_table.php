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
    Schema::create('ordens', function (Blueprint $table) {
        $table->id();
        $table->string('mesa');            // Ej: "Mesa 1"
        $table->string('cliente')->nullable(); 
        $table->decimal('total', 10, 2)->default(0);
        
        // El estado del pedido es vital para la cocina
        $table->enum('estatus', ['pendiente', 'preparando', 'listo', 'entregado'])->default('pendiente');
        
        $table->text('nota_general')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
