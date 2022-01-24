<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Admin\ProductosCrudController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use App\Http\Controllers\EgresadoFormController;
use App\Http\Controllers\EmpresaFormController;

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

Route::prefix('Tecko')->group(function () {
    Route::get('/home',[homeController::class, 'show'])->name('app.home');

});

//Por esta ruta se manda al formulario en el cual se rellena la informacion par la incercion
Route::get('Egresado/Form',[EgresadoFormController::class, 'index'])->name('app.egresadoform');

//por esta ruta se manda la informacion del formulario a la base de datos
Route::post('Egresado/store',[EgresadoFormController::class, 'store'])->name('app.egresadostore');

//por esta ruta se actualiza el registro 
Route::put('Egresado/update',[EgresadoFormController::class, 'update'])->name('app.egresadoupdate');

//Por esta ruta se muestra el formulario
Route::get('Empresa/Form',[EmpresaFormController::class, 'index'])->name('app.empresaform');

//Por esta ruta se manda la informacion del formulario a la base de datos
Route::post('store',[EmpresaFormController::class, 'store'])->name('app.empresastore');

//por esta ruta se actualiza el registro
Route::put('update', [EmpresaFormController::class, 'update'])->name('app.empresaupdate');