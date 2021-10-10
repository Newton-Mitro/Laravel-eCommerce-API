<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ProductReview;
use Illuminate\Database\Seeder;
use Database\Seeders\OrderStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Brand::factory(20)->create();
        Category::factory(3)->create();
        Subcategory::factory(50)->create();

        $this->call([
            OrderStatusSeeder::class,
            ProductUnitSeeder::class,
        ]);

        Product::factory(100)->create();
        ProductReview::factory(300)->create();
    }
}
