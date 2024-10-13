<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // payment
    Route::post('/checkout/process/{id}', [PaymentController::class, 'transaction'])->name('tourguide/checkout.process');
    Route::get('/checkout/payment/{id}', [PaymentController::class, 'payment'])->name('tourguide/checkout.payment');

    // cart or order list
    Route::get('/order/list', [OrderListController::class, 'index'])->name('tourguide/order.list');

});

// main
Route::get('/', [MainController::class, 'index'])->name('tourguide.dashboard');
Route::get('/about', [MainController::class, 'about'])->name('tourguide.about');

// product
Route::get('/product', [ProductController::class, 'index'])->name('tourguide.product');
Route::get('/product/create', [ProductController::class, 'create'])->name('tourguide/product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('tourguide/product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('tourguide/product.edit');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('tourguide/product.show');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('tourguide/product.update');
Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('tourguide/product.destroy');





require __DIR__.'/auth.php';
