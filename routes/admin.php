<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeController;

Route::get('home',[homeController::class, 'index'])->name('admin.home');