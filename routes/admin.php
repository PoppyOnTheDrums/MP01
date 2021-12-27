<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;

Route::get('home',[homeController::class, 'index'])->name('admin.home');

Route::get('productos',[homeController::class, 'productos'])->name('admin.productos');

Route::get('usuarios',[homeController::class, 'user'])->name('admin.user');
