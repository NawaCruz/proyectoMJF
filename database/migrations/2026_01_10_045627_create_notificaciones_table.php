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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id('id_notificacion');
            $table->string('tipo', 255);
            $table->string('titulo', 255);
            $table->string('mensaje', 255);
            $table->boolean('leido')->default(false);
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_leido')->nullable();
            $table->foreignId('id_user')
                ->constrained('users', 'id_user')
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
        Schema::dropIfExists('notificaciones');
    }
};
