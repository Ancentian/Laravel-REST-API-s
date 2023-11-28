<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;

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

Route::prefix('products')->group(function () {
    Route::get('/index', [ProductsController::class, 'getProducts']);
    Route::post('/store', [ProductsController::class, 'store']);
});

Route::prefix('categories')->group(function () {
    Route::get('/index', [ProductsController::class, 'index']);
});
