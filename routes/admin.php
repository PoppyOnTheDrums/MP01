<?php

use App\Http\Controllers\Admin\AsignAdmin;
use App\Http\Controllers\Admin\EgresadoController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\VacanteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Models\User;

//muestra la vista de la pagina principal del administrador
Route::get('home',[homeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::get('Vacante',[VacanteController::class, 'index'])->middleware('can:admin.home')->name('admin.vacante');

Route::get('Empresa',[EmpresaController::class, 'index'])->middleware('can:admin.home')->name('admin.empresa');

Route::get('Egresado',[EgresadoController::class, 'index'])->middleware('can:admin.home')->name('admin.egresado');

Route::get('Egresado/{egresado}',[EgresadoController::class, 'show'])->middleware('can:admin.home')->name('admin.egresadoinfo');

Route::get('Empresa/{empresa}',[EmpresaController::class, 'show'])->middleware('can:admin.home')->name('admin.empresainfo');

Route::get('Vacante/{vacante}',[VacanteController::class, 'show'])->middleware('can:admin.home')->name('admin.vacanteinfo');

Route::put('Vacante/{vacante}',[VacanteController::class, 'update'])->middleware('can:admin.home')->name('admin.vacanteupdate');

Route::get('Vacantes/{vacante}', [AsignAdmin::class, 'index'])->middleware('can:admin.home')->name('admin.vacanteasign');

Route::post('Vacantes/Asign', [AsignAdmin::class, 'store'])->middleware('can:admin.home')->name('admin.asignstore');

Route::delete('V/{detalle_v}', [AsignAdmin::class, 'destroy'])->middleware('can:admin.home')->name('admin.asigndelete');