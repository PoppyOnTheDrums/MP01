<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\ProductosCrudController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;

//muestra la vista de la pagina principal del administrador
Route::get('home',[homeController::class, 'index'])->name('admin.home');

//muestra la pagina donde se visualizan los productos 
Route::get('productos',[homeController::class, 'productos'])->name('admin.productos');

//muestra la pagina donde se visualizan los usuarios 
Route::get('usuarios',[homeController::class, 'user'])->name('admin.user');

Route::get('{user}/edit', [UserController::class, 'edit'])->name('admin.useredit');

Route::put('{user}', [UserController::class, 'update'])->name('admin.userupdate');

//muestra la pagina para crear un usuario 
Route::get('crear',[ProductosCrudController::class, 'index'])->name('admin.create');

//Esta es la ruta por la cual se inserta los registros a la base de datos
Route::post('store',[ProductosCrudController::class, 'store'])->name('admin.productostore');

//muestra el registro a editar
Route::get('{producto}/edit', [ProductosCrudController::class, 'edit'])->name('admin.productosedit');

//Esta es la ruta por la cual se madara el producto a editar en la base de datos
Route::put('{producto}',  [ProductosCrudController::class, 'update'])->name('admin.productosupdate');

//esta ruta borra el registro
Route::delete('{producto}',  [ProductosCrudController::class, 'destroy'])->name('admin.productosdelete');

