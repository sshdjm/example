<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'getCart'])->name('cart.index');
Route::post('/order/create', [OrderController::class, 'createOrder'])->name('order.create');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/orders', [AdminController::class, 'adminIndex'])->name('admin.orders.index')->middleware(AdminMiddleware::class);
Route::delete('/admin/orders/{order}', [AdminController::class, 'destroy'])->name('admin.orders.destroy')->middleware(AdminMiddleware::class);

