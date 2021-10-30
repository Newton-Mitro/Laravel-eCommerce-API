<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeperateDeliveredOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:delivered';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move all delivered orders from orders to deliveries table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
        echo "Delivered orders successfully moved.";
    }
}
