<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActivoToAdopcionesTable extends Migration
{
    public function up()
    {
        Schema::table('adopciones', function (Blueprint $table) {
            $table->boolean('activo')->default(true); // Columna 'activo'
        });
    }

    public function down()
    {
        Schema::table('adopciones', function (Blueprint $table) {
            $table->dropColumn('activo'); // Eliminar columna 'activo'
        });
    }
}
