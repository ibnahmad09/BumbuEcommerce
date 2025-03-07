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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ReportController;
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

Auth::routes(['verify' => true]);


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/categories', CategoryController::class)->except('show');
    Route::resource('/products', ProductController::class)->except('show');
    Route::resource('/order', AdminOrderController::class)->except(['create', 'store', 'edit']);
    Route::post('/order/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::resource('/users', UserController::class)->except('show');
    Route::get('/report', [ReportController::class, 'index'])->name('admin.reports.index');
    Route::post('/report/generate', [ReportController::class, 'generate'])->name('admin.reports.generate');
});


Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');

Route::post('/midtrans/notification', [PaymentController::class, 'handleNotification']);

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy', 'update']);
    Route::resource('orders', OrderController::class)->only(['index', 'show']);
    Route::resource('reviews', ReviewController::class)->only(['store', 'update','index']);
    Route::get('/products', [UserProductController::class, 'index'])->name('user.products.index');
    Route::get('/products/{product}', [UserProductController::class, 'show'])->name('user.products.show');
    Route::post('/chatbot', [ChatbotController::class, 'handle'])->name('chatbot.handle');
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::prefix('checkout')->group(function() {
        Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/process', [CheckoutController::class, 'process'])->name('checkout.process');
    });

    Route::prefix('profile')->group(function() {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/security', [ProfileController::class, 'security'])->name('profile.security');
        Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    });

    Route::prefix('profile')->group(function() {
        Route::get('/address', [ProfileController::class, 'address'])->name('profile.address');
        Route::post('/address', [ProfileController::class, 'storeAddress'])->name('profile.address.store');
        Route::delete('/address/{id}', [ProfileController::class, 'deleteAddress'])->name('profile.address.delete');
        Route::get('/address/{address}/edit', [ProfileController::class, 'editAddress'])->name('profile.address.edit');
        Route::put('/address/{address}', [ProfileController::class, 'updateAddress'])->name('profile.address.update');
    });

});


