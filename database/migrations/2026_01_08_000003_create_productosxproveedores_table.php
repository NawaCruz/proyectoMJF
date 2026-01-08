<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productosxproveedores', function (Blueprint $table) {

            $table->foreignId('id_proveedor')
                ->constrained('proveedores', 'id_proveedor')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_producto')
                ->constrained('productos', 'id_producto')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary(['id_proveedor', 'id_producto']); //id compuesta por dos id foraneas
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productosxproveedores');
    }
};
