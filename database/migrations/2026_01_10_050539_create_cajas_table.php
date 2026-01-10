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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id('id_caja');
            $table->foreignId('id_user')
                ->constrained('users', 'id_user')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->decimal('monto_apertura', 10, 2);
            $table->decimal('monto_cierre', 10, 2);
            $table->decimal('monto_en_caja', 10, 2);
            $table->dateTime('fecha_apertura');
            $table->dateTime('fecha_cierre');
            $table->string('estado', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
