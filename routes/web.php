<?php

use App\Http\Controllers\Admin\SellerController as AdminSellerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Cashier\CashierController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sellers', AdminSellerController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('cashiers', CashierController::class);
    Route::get('/categories/{category}/products', [CashierController::class,'showProducts'])->name('categories.showProducts');
    Route::post('/add-to-cart', [CashierController::class,'addToCart'])->name('addToCart');
    Route::get('/invoice/{orderItem}', [CashierController::class,'showInvoice'])->name('showInvoice');
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
