<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class Egresado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('graduacion')->nullable();
            $table->text('institucion_educativa');
            $table->text('curso');
            $table->text('matricula');
            $table->integer('cedula');
            $table->text('carrera_tecnica')->nullable();
            $table->text('tecnico_basico')->nullable();
            $table->text('nombre');
            $table->text('apellido');
            $table->date('fecha_nac');
            $table->string('sexo');
            $table->text('direccion');
            $table->text('sector');
            $table->text('seccion');
            $table->text('municipio');
            $table->text('provincia');
            $table->text('pais_nacionalidad');
            $table->text('telefono_recidencial');
            $table->text('telefono_movil');
            $table->string('licencia')->default('no');
            $table->string('vehiculo')->default('no');
            $table->text('email');
            $table->integer('experiencia');
            $table->string('file')->nullable();
            $table->text('area_tecnica_trabajo');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egresados');
    }
}
