<?php

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/task', function () {
    DB::transaction(function () { // Start the transaction
        Order::query()
            ->where('order_status_id', 1)
            ->each(function ($oldRecord) {
                $newRecord = $oldRecord->replicate();
                $newRecord->setTable('deliveries');
                OrderItem::query()->where('order_id', $oldRecord->id)
                    ->each(function ($oldItemRecord) {
                        $newItemRecord = $oldItemRecord->replicate();
                        $newItemRecord->setTable('delivery_items');
                        if ($newItemRecord->save()) {
                            $oldItemRecord->delete();
                        }
                    });
                if ($newRecord->save()) {
                    $oldRecord->delete();
                }
            });
    }); // End transa
});
