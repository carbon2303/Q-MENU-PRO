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
    Schema::create('orden_detalles', function (Blueprint $table) {
        $table->id();
        
        // Conexiones clave: ¿A qué orden pertenece? ¿Qué platillo es?
        $table->foreignId('orden_id')->constrained('ordens')->onDelete('cascade');
        $table->foreignId('platillo_id')->constrained('platillos');
        
        $table->integer('cantidad');       // Ej: 2
        $table->decimal('precio', 10, 2);  // Precio al momento de la compra
        $table->string('notas')->nullable(); // Ej: "Sin cebolla"
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_detalles');
    }
};
