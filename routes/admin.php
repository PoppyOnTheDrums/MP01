<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\ProductosCrudController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;

//muestra la vista de la pagina principal del administrador
Route::get('home',[homeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

//muestra la pagina donde se visualizan los productos 
Route::get('productos',[homeController::class, 'productos'])->middleware('can:admin.productos')->name('admin.productos');

//muestra la pagina donde se visualizan los usuarios 
Route::get('usuarios',[homeController::class, 'user'])->middleware('can:admin.user')->name('admin.user');

//esta ruta muestra el usuario a editar
Route::get('{user}/edit', [UserController::class, 'edit'])->middleware('can:admin.usercrud')->name('admin.useredit');

//Por esta ruta se manda el usuario a editar
Route::put('{user}', [UserController::class, 'update'])->middleware('can:admin.usercrud')->name('admin.userupdate');

//por esta ruta se visualiza la ventana de crear productos
route::get('Crear', [ProductosCrudController::class, 'create'])->middleware('can:admin.productoscrud')->name('admin.productocrear');

//por esta ruta se manda el producto a la bdd
Route::post('Crear', [ProductosCrudController::class, 'store'])->middleware('can:admin.productoscrud')->name('admin.productostore');

//Muestra el producto a editar
route::get('productos/{producto}', [ProductosCrudController::class, 'edit'])->middleware('can:admin.productoscrud')->name('admin.productoeditar');

//por esta ruta se actuliza el registro del producto
route::put('productos/{producto}', [ProductosCrudController::class, 'update'])->middleware('can:admin.productoscrud')->name('admin.productoupdate');

//por esta ruta se borran los productos de la base de datos
route::delete('productos/{producto}', [ProductosCrudController::class, 'destroy'])->middleware('can:admin.productoscrud')->name('admin.productodelete');