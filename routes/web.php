<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');