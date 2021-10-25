<?php

namespace Database\Seeders;

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
        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            OrderStatusSeeder::class,
            ProductUnitSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            ProductReviewSeeder::class,
        ]);
    }
}
