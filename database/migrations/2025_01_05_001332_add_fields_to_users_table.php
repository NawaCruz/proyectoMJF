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
        Schema::table('users', function (Blueprint $table) {
            // Si tu users actual NO tiene "nombre" (algunos vienen con "name")
            if (Schema::hasColumn('users', 'name') && !Schema::hasColumn('users', 'nombre')) {
                $table->renameColumn('name', 'nombre');
            }

            // Roles: admin, cajero, etc.
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role', 100)->default('cajero')->after('password');
            }

            // Si quieres vincular users con movimientos, OJO:
            // Esto puede romper por orden/circularidad si movimientos aún no existe.
            // Mejor dejarlo como columna nullable SIN FK (o agregar FK en otra migración al final).
            if (!Schema::hasColumn('users', 'id_movimiento')) {
                $table->unsignedBigInteger('id_movimiento')->nullable()->after('id_user');
            }
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'id_movimiento')) {
                $table->dropColumn('id_movimiento');
            }

            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }

            // revert rename (solo si existía)
            if (Schema::hasColumn('users', 'nombre') && !Schema::hasColumn('users', 'name')) {
                $table->renameColumn('nombre', 'name');
            }
        });
    }
};
