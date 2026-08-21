<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MakeupController;
use App\Http\Controllers\SkincareController;
use App\Http\Controllers\PerfumesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
Route::get('/maquillaje', [MakeupController::class, 'index'])->name('makeup.index');
Route::get('/skincare', [SkincareController::class, 'index'])->name('skincare.index');
Route::get('/perfumeria', [PerfumesController::class, 'index'])->name('perfumes.index');