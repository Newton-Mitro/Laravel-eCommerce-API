<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductUnit;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('products')->insert([
            'product_code' => "1000000001",
            'product_name' => "Milk Vita",
            'discription' => $faker->paragraph(3, true),
            'stock' => $faker->numberBetween(1, 10),
            'price' => $faker->numberBetween(50, 1000),
            'discount' => $faker->numberBetween(5, 20),
            'active' => true,
            'category_id' => 2,
            'subcategory_id' => 5,
            'brand_id' => 3,
            'product_unit_id' => 1,
        ]);
        Product::factory(100)->create();
    }
}
