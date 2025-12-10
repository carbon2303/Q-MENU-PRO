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
    Schema::create('platillos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');          // Ej: "Hamburguesa"
        $table->decimal('precio', 10, 2);  // Ej: 120.50
        $table->text('descripcion')->nullable();
        $table->string('imagen')->nullable();
        
        // Esta línea conecta con la tabla de arriba (categorias)
        $table->foreignId('categoria_id')->constrained('categorias');
        
        $table->boolean('activo')->default(true);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platillos');
    }
};
