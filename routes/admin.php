<?php

use App\Http\Controllers\Admin\EgresadoController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\VacanteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Models\User;

//muestra la vista de la pagina principal del administrador
Route::get('home',[homeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::get('Vacante',[VacanteController::class, 'index'])->name('admin.vacante');

Route::get('Empresa',[EmpresaController::class, 'index'])->name('admin.empresa');

Route::get('Egresado',[EgresadoController::class, 'index'])->name('admin.egresado');

Route::get('Egresado/{egresado}',[EgresadoController::class, 'show'])->name('admin.egresadoinfo');

Route::get('Empresa/{empresa}',[EmpresaController::class, 'show'])->name('admin.empresainfo');

Route::get('Vacante/{vacante}',[VacanteController::class, 'show'])->name('admin.vacanteinfo');

Route::put('Vacante/{vacante}',[VacanteController::class, 'update'])->name('admin.vacanteupdate');