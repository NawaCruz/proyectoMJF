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
            Schema::create('historial_compras', function (Blueprint $table) {
    $table->id('id_historial_compra');

    $table->unsignedBigInteger('id_cliente');
    $table->unsignedBigInteger('id_producto');

    $table->dateTime('fecha_compra');
    $table->integer('cantidad');

    $table->timestamps();

    $table->foreign('id_cliente')
        ->references('id_cliente')
        ->on('clientes')
        ->cascadeOnUpdate()
        ->cascadeOnDelete();

    $table->foreign('id_producto')
        ->references('id_producto')
        ->on('productos')
        ->cascadeOnUpdate()
        ->restrictOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_compras');
    }
};
