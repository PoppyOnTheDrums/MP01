<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vacante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->index('user_id');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('empresa_id')->references('id')->on('empresas');
            $table->text('nombre');
            $table->text('puesto');
            $table->text('perfi_puesto');
            $table->double('sueldo');
            $table->text('ubicacion')->nullable();
            $table->text('tipo_contrato')->nullable();
            $table->text('horario');
            $table->text('correro_curriculum');
            $table->text('telefono');
            $table->text('persona_contacto');
            $table->string('estado')->default('abierta'); 
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
        Schema::dropIfExists('vacantes');
    }
}
