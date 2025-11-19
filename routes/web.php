<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Frontend routes
Route::get('/front/home', function () {
    return view('front.home');
})->name('front.home');

Route::get('/product/detail/{id}', function ($id) {
    return view('front.product-detail', compact('id'));
})->name('product.detail');

Route::get('/checkout', function () {
    return view('front.checkout');
})->name('checkout');

Route::get('/checkout/{id}', function ($id) {
    return view('front.checkout', compact('id'));
})->name('checkout.product');

Route::get('/order-success', function () {
    return view('front.order-success');
})->name('order.success');

Route::get('/cart', function () {
    return view('front.cart');
})->name('cart');

Route::get('/wishlist', function () {
    return view('front.wishlist');
})->name('wishlist');

// Order routes
Route::middleware(['auth'])->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes
Route::get('/admin/dashboard', function () {
    $orders = \App\Models\Order::with(['user', 'orderItems'])
        ->orderBy('created_at', 'desc')
        ->get();
    return view('admin.dashboard', compact('orders'));
})->name('admin.dashboard')->middleware('admin');

Route::get('/user/dashboard', function () {
    return redirect()->route('front.home');
})->name('user.dashboard')->middleware('auth');

Route::get('/home', function () {
    return redirect()->route('front.home');
})->name('home');
