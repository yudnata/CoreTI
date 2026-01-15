<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add_to_cart');

    Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update'); // Added Update Route

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place_order');
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/admin/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
    
    Route::get('/admin/products/edit/{id}', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::post('/admin/products/update/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');

    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::post('/admin/orders/{id}/update', [AdminController::class, 'updatePaymentStatus'])->name('admin.orders.update');
    Route::get('/admin/orders/{id}/delete', [AdminController::class, 'deleteOrder'])->name('admin.orders.delete');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    Route::get('/admin/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::get('/admin/messages/{id}/delete', [AdminController::class, 'deleteMessage'])->name('admin.messages.delete');
});

require __DIR__ . '/auth.php';
