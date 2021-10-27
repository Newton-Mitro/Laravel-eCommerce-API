<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_units = ['Litter', 'Pack', 'KG', 'gm', 'Box', 'Bottle'];
        foreach ($product_units as $unit) {
            DB::table('product_units')->insert([
                'unit_name' => $unit
            ]);
        }
    }
}
