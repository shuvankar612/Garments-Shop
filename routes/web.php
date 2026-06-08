<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

Route::resource('products', ProductController::class);

Route::get('/add-to-cart/{id}',
[ProductController::class, 'addToCart'])
->name('add.to.cart');

Route::get('/cart',
[ProductController::class, 'cart'])
->name('cart');

Route::get('/checkout',
[ProductController::class, 'checkout'])
->name('checkout');

Route::get('/cart/remove/{id}',
[ProductController::class, 'removeCart'])
->name('cart.remove');

Route::get('/cart/increase/{id}',
[ProductController::class,'increaseQuantity'])
->name('cart.increase');

Route::get('/cart/decrease/{id}',
[ProductController::class,'decreaseQuantity'])
->name('cart.decrease');

Route::get('/cart/clear',
[ProductController::class,'clearCart'])
->name('cart.clear');

Route::get('/category-products/{id}',
[ProductController::class, 'categoryProducts'])
->name('categories.products');

Route::get('/admin/dashboard',
[DashboardController::class, 'index'])
->name('admin.dashboard');

Route::post('/order/store',
[OrderController::class, 'store'])
->name('order.store');

Route::get('/admin/orders',
[OrderController::class, 'index'])
->name('orders.index');

Route::post('/orders/{id}/status',
[OrderController::class, 'updateStatus'])
->name('orders.status');

/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
*/

Route::resource('categories', CategoryController::class);

Route::get('/categories/{id}/products',
[ProductController::class, 'categoryProducts'])
->name('categories.products');

require __DIR__.'/auth.php';

Route::get('/test', function () {
    return "Laravel Working";
});