<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\{MainController, CategoryController, CarController, OrderController, ProductController};
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'] )->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});
Route::group(['prefix'=>'/' ,'middleware'=>'auth'], function (){
    Route::get('/', [ \App\Http\Controllers\MainController::class, 'index'])->name('home');
    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('cat');
    Route::get('/categories/{id}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.single');
    Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('show.product');
    Route::get('/cart',[\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::get('/cart/save', [\App\Http\Controllers\CartController::class, 'saveOrder'])->name('save.order');
    Route::get('/cart/delete/{id}', [\App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
Route::group(['prefix'=>'admin', 'middleware' => 'admin'], function (){
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/cars', CarController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/order-products', \App\Http\Controllers\Admin\OrderProductController::class);
});
