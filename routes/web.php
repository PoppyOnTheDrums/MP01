<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Admin\ProductosCrudController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AsignController;
use App\Models\User;
use App\Http\Controllers\EgresadoFormController;
use App\Http\Controllers\EmpresaFormController;
use App\Http\Controllers\VacanteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app.home');
})->name('inicio');

Route::get('/home', function () {
    return view('app.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* Route::get('/home',[homeController::class, 'show'])->name('tienda.home'); */

Route::prefix('IPISA')->group(function () {
    Route::get('/home', [homeController::class, 'show'])->name('app.home');
});

//Por esta ruta se manda al formulario en el cual se rellena la informacion par la incercion
Route::get('Egresado/Form', [EgresadoFormController::class, 'index'])->middleware('can:egresado.all')->name('app.egresadoform');

//por esta ruta se manda la informacion del formulario a la base de datos
Route::post('Egresado/store', [EgresadoFormController::class, 'store'])->middleware('can:egresado.all')->name('app.egresadostore');

//por esta ruta se actualiza el registro 
Route::put('Egresado/update', [EgresadoFormController::class, 'update'])->middleware('can:egresado.all')->name('app.egresadoupdate');

//Por esta ruta se muestra el formulario
Route::get('Empresa/Form', [EmpresaFormController::class, 'index'])->middleware('can:empresa.all')->name('app.empresaform');

//Por esta ruta se manda la informacion del formulario a la base de datos
Route::post('store', [EmpresaFormController::class, 'store'])->middleware('can:empresa.all')->name('app.empresastore');

//por esta ruta se actualiza el registro
Route::put('update', [EmpresaFormController::class, 'update'])->middleware('can:empresa.all')->name('app.empresaupdate');

//por esta ruta se mestran las vacantes
Route::get('Vacante', [VacanteController::class, 'index'])->middleware('can:empresa.all')->name('app.vacantes');

//por esta ruta se lleva a la ventana de crear
Route::get('Vacantes/create', [VacanteController::class, 'create'])->middleware('can:empresa.all')->name('app.vacantescreate');

//por esta ruta se manda la informacion a la base de datos
Route::post('Vacantes/store', [VacanteController::class, 'store'])->middleware('can:empresa.all')->name('app.vacantesstore');

//por esta ruta se manda a la vancante a editar
Route::get('Vacantes/{vacante}', [VacanteController::class, 'edit'])->middleware('can:empresa.all')->name('app.vacantesedit');

Route::put('Vacantes/{vacante}', [VacanteController::class, 'update'])->middleware('can:empresa.all')->name('app.vacantesupdate');

Route::get('Egresados/Vacantes', [VacanteController::class, 'show'])->middleware('can:egresado.all')->name('app.vacanteshow');

Route::get('Empresa/Egresados', [EgresadoFormController::class, 'show'])->middleware('can:empresa.all')->name('app.egresadoshow');

Route::get('Vacante/{vacante}', [AsignController::class, 'index'])->middleware('can:empresa.all')->name('app.vacanteasign');

Route::post('Vacante/Asign', [AsignController::class, 'store'])->middleware('can:empresa.all')->name('app.asignstore');

Route::delete('V/{detalle_v}', [AsignController::class, 'destroy'])->middleware('can:empresa.all')->name('app.asigndelete');
