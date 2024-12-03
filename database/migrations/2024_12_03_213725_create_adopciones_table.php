<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdopcionesTable extends Migration
{
    public function up()
    {
        Schema::create('adopciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id'); // Relación con la mascota
            $table->string('nombre_mascota');
            $table->unsignedInteger('edad')->nullable();
            $table->text('descripcion');
            $table->string('imagen_url')->nullable();
            $table->enum('estado_adopcion', ['disponible', 'adoptado', 'pendiente'])->default('disponible');
            $table->timestamps();

            // Crear la clave foránea entre adopciones y mascotas
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('adopciones', function (Blueprint $table) {
            // Eliminar la clave foránea antes de eliminar la tabla
            $table->dropForeign(['mascota_id']);
        });

        Schema::dropIfExists('adopciones');
    }
}
