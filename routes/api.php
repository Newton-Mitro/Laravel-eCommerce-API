<?php

use App\Http\Controllers\ProductUnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Resources\User\UserCollection;

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

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers',], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
});

Route::apiResource('products', ProductController::class);
Route::get('products/search/{name}', [ProductController::class, 'search'])->name('product.search');
Route::get('{brand}/products', [ProductController::class, 'productsByBrand'])->name('product.byBrand');
Route::group(['prefix' => 'products'], function () {
    Route::apiResource('{product}/reviews', ProductReviewController::class);
});

Route::apiResource('orders', OrderController::class);
Route::get('orders/{user}/users', [OrderController::class, 'getOrdersByUserId'])->name('order.users');
Route::patch('orders/status/{order}', [OrderController::class, 'updateStatus'])->name('order.update_status');
Route::group(['prefix' => 'orders'], function () {
    Route::apiResource('{order}/items', OrderItemController::class);
    Route::get('{order}/items', [OrderItemController::class,'findByOrderId'])->name('items.by_order');
});

Route::apiResource('order-statuses', OrderStatusController::class);
Route::apiResource('brands', BrandController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('sub-categories', SubcategoryController::class);
Route::apiResource('product-units', ProductUnitController::class);
