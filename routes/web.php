<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::prefix('customer')->group(function () {
    Route::get('index', [CustomerController::class, 'index']);

    Route::prefix('register')->group(function () {
        Route::get('/', [CustomerController::class, 'getRegister']);
        Route::post('/', [CustomerController::class, 'postRegister']);
    });

    Route::prefix('login')->middleware('CheckCustomerLogin')->group(function () {
        Route::get('/', [CustomerController::class, 'getLogin']);
        Route::post('/', [CustomerController::class, 'postLogin']);
    });

    Route::get('logout', [CustomerController::class, 'getLogout']);

    Route::prefix('category')->group(function () {
        Route::get('{id}', [CustomerController::class, 'showByCategory']);
    });

    Route::prefix('product')->group(function () {
        Route::get('{id}', [CustomerController::class, 'getDetail']);
        Route::post('{id}', [CustomerController::class, 'storeCart']);
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', [CustomerController::class, 'viewCart']);
        Route::get('delete/{productId}', [CustomerController::class, 'removeItem']);
        Route::post('update', [CustomerController::class, 'updateCart']);
        Route::post('pay', [CustomerController::class, 'placeOrder']);
    });

    Route::get('search', [ProductController::class, 'search']);

});

Route::prefix('admin')->group(function () {
    Route::prefix('login')->middleware('CheckLoggedIn')->group(function () {
        Route::get('/', [AdminController::class, 'getLogin']);
        Route::post('/', [AdminController::class, 'postLogin']);
    });

    Route::get('logout', [AdminController::class, 'getLogout']);
    Route::get('index', [AdminController::class, 'index'])->middleware('CheckLoggedOut');

    Route::prefix('customer')->middleware('CheckLoggedOut')->group(function () {
        Route::get('/', [AdminController::class, 'getCustomer']);
        Route::get('edit/{id}', [AdminController::class, 'getEditCustomer']);
        Route::post('edit/{id}', [AdminController::class, 'postEditCustomer']);
        Route::get('delete/{id}', [AdminController::class, 'getDeleteCustomer']);
        Route::get('search', [AdminController::class, 'searchCustomer']);
    });

    Route::prefix('category')->middleware('CheckLoggedOut')->group(function () {
        Route::get('/', [CategoryController::class, 'getCategory']);
        Route::get('add', [CategoryController::class, 'getAddCategory']);
        Route::post('add', [CategoryController::class, 'postAddCategory']);
        Route::get('edit/{id}', [CategoryController::class, 'getEditCategory']);
        Route::post('edit/{id}', [CategoryController::class, 'postEditCategory']);
        Route::get('delete/{id}', [CategoryController::class, 'getDeleteCategory']);
        Route::get('search', [AdminController::class, 'searchCategory']);
    });

    Route::prefix('product')->middleware('CheckLoggedOut')->group(function () {
        Route::get('/', [ProductController::class, 'getProduct']);
        Route::get('add', [ProductController::class, 'getAddProduct']);
        Route::post('add', [ProductController::class, 'postAddProduct']);
        Route::get('edit/{id}', [ProductController::class, 'getEditProduct']);
        Route::post('edit/{id}', [ProductController::class, 'postEditProduct']);
        Route::get('delete/{id}', [ProductController::class, 'getDeleteProduct']);
        Route::get('search', [AdminController::class, 'searchProduct']);
    });

    Route::prefix('order')->middleware('CheckLoggedOut')->group(function () {
        Route::get('/', [AdminController::class, 'getOrder']);
        Route::get('delete/{id}', [AdminController::class, 'getDeleteOrder']);
        Route::get('detail/{orderID}', [AdminController::class, 'viewOrderDetail']);
        Route::get('search', [AdminController::class, 'searchOrder']);
    });

});
