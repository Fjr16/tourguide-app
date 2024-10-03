<?php

use App\Http\Controllers\MainController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// main
Route::get('/', [MainController::class, 'index'])->name('tourguide.dashboard');

// product
Route::get('/product', [ProductController::class, 'index'])->name('tourguide.product');
Route::get('/product/create', [ProductController::class, 'create'])->name('tourguide/product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('tourguide/product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('tourguide/product.edit');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('tourguide/product.update');
Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('tourguide/product.destroy');

// payment
Route::get('/checkout', [PaymentController::class, 'index'])->name('tourguide.checkout');

require __DIR__.'/auth.php';
