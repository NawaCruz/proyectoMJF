<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->decimal('total', 10, 2);
            $table->string('estado', 20);
            $table->timestamps();

            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users', 'id_user')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_proveedor')
                ->nullable()
                ->constrained('proveedores', 'id_proveedor')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_metodo_pago')
                ->nullable()
                ->constrained('metodo_pagos', 'id_metodo_pago')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
