<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\ProductosCrudController;

Route::get('home',[homeController::class, 'index'])->name('admin.home');

Route::get('productos',[homeController::class, 'productos'])->name('admin.productos');

Route::get('usuarios',[homeController::class, 'user'])->name('admin.user');

Route::get('crear',[ProductosCrudController::class, 'index'])->name('admin.create');

Route::post('store',[ProductosCrudController::class, 'store'])->name('admin.store');