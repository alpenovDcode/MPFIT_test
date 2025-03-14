<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::patch('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete'); 