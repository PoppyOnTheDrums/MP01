<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\ProductosCrudController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;

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
    return view('tienda.home');
})->name('inicio');

Route::get('/home', function () {
    return view('tienda.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* Route::get('/home',[homeController::class, 'show'])->name('tienda.home'); */

Route::prefix('Tecko')->group(function () {
    Route::get('/home',[homeController::class, 'show'])->name('app.home');

});