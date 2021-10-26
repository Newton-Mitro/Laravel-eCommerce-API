<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth','namespace' => 'App\Http\Controllers',], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::apiResource('products', ProductController::class);
Route::get('products/search/{name}', [ProductController::class, 'search'])->name('product.search');
Route::apiResource('brands', BrandController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('sub-categories', SubcategoryController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order-statuses', OrderStatusController::class);
Route::apiResource('order-items', OrderStatusController::class);
Route::apiResource('product-reviews', ProductReviewController::class);
