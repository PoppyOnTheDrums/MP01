<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->text('nombre');
            $table->integer('rnc');
            $table->string('visibilidad');
            $table->string('dp_formacion');
            $table->string('alcance');
            $table->text('actividad_economica');
            $table->text('industria');
            $table->text('tamano');
            $table->text('direccion');
            $table->text('sector');
            $table->text('seccion');
            $table->text('municipio');
            $table->text('provincia');
            $table->text('pais');
            $table->text('telefono_principal');
            $table->text('telefono_directo');
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
        Schema::dropIfExists('empresas');
    }
}
