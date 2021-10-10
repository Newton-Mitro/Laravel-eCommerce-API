<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Processing','Approved','Rejected','Shipped','Delivered'];
        foreach ($statuses as $status){
            DB::table('order_statuses')->insert([
                'status_name' => $status
            ]);
        }
    }
}
