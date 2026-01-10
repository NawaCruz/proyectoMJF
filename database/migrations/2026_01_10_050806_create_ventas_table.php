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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('id_venta');
            $table->foreignId('id_cliente')
                ->constrained('clientes', 'id_cliente')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_user')
                ->constrained('users', 'id_user')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->dateTime('fecha_venta');
            $table->decimal('total', 10, 2);
            $table->string('metodo_pago', 255);
            $table->string('estado', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
