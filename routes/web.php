<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use \App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AboutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', [GuestController::class, 'index'])->name('guest.index');

Auth::routes();


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/categories', CategoryController::class)->except('show');
    Route::resource('/products', ProductController::class)->except('show');
    Route::resource('/order', AdminOrderController::class)->except(['create', 'store', 'edit']);
    Route::post('/order/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});


Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');

Route::post('/midtrans/notification', [PaymentController::class, 'handleNotification']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy', 'update']);
    Route::resource('orders', OrderController::class)->only(['index', 'show']);
    Route::resource('reviews', ReviewController::class)->only(['store', 'update','index']);
    Route::get('/products', [UserProductController::class, 'index'])->name('user.products.index');
    Route::post('/chatbot', [ChatbotController::class, 'handle'])->name('chatbot.handle');
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::prefix('checkout')->group(function() {
        Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/process', [CheckoutController::class, 'process'])->name('checkout.process');
    });
});


