<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\http\controllers\ProductController;
use App\http\controllers\CategoryController;
use App\http\controllers\BannerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource("/category",CategoryController::class);
Route::resource('products',ProductController::class);
Route::resource('shop',ShopController::class);
Route::resource('banners', BannerController::class);
Route::resource('cart',ShopController::class);


Route::get('/cart', [CartController::class, 'index'])->name('products.cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/cart/editCart/{id}', [CartController::class, 'edit'])->name('cart.edit');
Route::patch('/cart/editCart/{id}', [CartController::class, 'update'])->name('cart.update');


