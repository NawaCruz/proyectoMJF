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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id('id_movimiento');
            $table->string('tipo', 255);
            $table->integer('cantidad');
            $table->string('origen', 255);
            $table->string('motivo', 255);
            $table->dateTime('fecha');
            $table->foreignId('id_user')
                ->constrained('users', 'id_user')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_producto')
                ->constrained('productos', 'id_producto')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
