<?php

use App\Http\Controllers\Admin\SellerController as AdminSellerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
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
    return view('auth.sing-in');
})->name('home');

Route::post('login',[AuthController::class,'login'])->name('sing-in');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('products', ProductController::class)->names('admin.products');
Route::resource('sellers', AdminSellerController::class)->names('admin.sellers');
Route::resource('orders', OrderController::class)->names('admin.orders');
Route::get('admin/generate-pdf/{orderId}', [OrderController::class,'generatePDF'])->name('generate.invoice');
Route::resource('cashiers', CashierController::class)->names('admin.cashiers');

    Route::get('/cashier/dashboard', [CashierController::class, 'dashboard'])->name('cashier.dashboard');
Route::get('/categories/{category}/products', [CashierController::class,'showProducts'])->name('categories.showProducts');
Route::post('/add-to-cart', [CashierController::class,'addToCart'])->name('addToCart');
Route::get('/invoice/{orderItem}', [CashierController::class,'showInvoice'])->name('showInvoice');
Route::get('/generate-pdf/{orderId}', [CashierController::class,'generatePDF'])->name('generate.pdf');
Route::post('/store-order/{orderId}', [CashierController::class,'storeOrder'])->name('store.order');
    


