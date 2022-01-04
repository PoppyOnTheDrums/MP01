<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\ProductosCrudController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SuplidorController;
use App\Http\Controllers\Admin\CategoriaController;
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

//por esta ruta se vizualisan los suplidores
Route::get('suplidor',[SuplidorController::class, 'index'])->middleware('can:admin.suplidorcrud')->name('admin.suplidor');

//por esta ruta se muerstra el formulario para crear suplidores
Route::get('suplidor/Create',[SuplidorController::class, 'create'])->middleware('can:admin.suplidorcrud')->name('admin.suplidorcreate');

//por esta ruta se inserta el registro en la bdd
Route::post('suplidor/Create',[SuplidorController::class, 'store'])->middleware('can:admin.suplidorcrud')->name('admin.suplidorstore');

//por esta ruta se muestra el registro a editar
Route::get('suplidor/{suplidor}',[SuplidorController::class, 'edit'])->middleware('can:admin.suplidorcrud')->name('admin.suplidoredit');

//por esta ruta se actualiza el registro
Route::put('suplidor/{suplidor}',[SuplidorController::class, 'update'])->middleware('can:admin.suplidorcrud')->name('admin.suplidorupdate');

//por esta ruta se borra el registro
route::delete('suplidor/{suplidor}', [SuplidorController::class, 'destroy'])->middleware('can:admin.suplidorcrud')->name('admin.suplidordelete');

//por esta ruta se accede a los registro de categoria
Route::get('categoria',[CategoriaController::class, 'index'])->middleware('can:admin.categoriacrud')->name('admin.categoria');

//por esta ruta se muestra el formulario para crear categorias
Route::get('categoria/Create',[CategoriaController::class, 'create'])->middleware('can:admin.categoriacrud')->name('admin.categoriacreate');

//por esta ruta se inserta el registro en la bdd
Route::post('categoria/Create',[CategoriaController::class, 'store'])->middleware('can:admin.categoriacrud')->name('admin.categoriastore');

//por esta ruta se muestra la categoria a editar
Route::get('categoria/{categorias}',[CategoriaController::class, 'edit'])->middleware('can:admin.categoriacrud')->name('admin.categoriasedit');

//por esta ruta se actualiza la categoria
Route::put('categoria/{categorias}',[CategoriaController::class, 'update'])->middleware('can:admin.categoriacrud')->name('admin.categoriasupdate');

//por esta ruta se elimina el registro
Route::delete('categoria/{categorias}',[CategoriaController::class, 'destroy'])->middleware('can:admin.categoriacrud')->name('admin.categoriasdelete');