<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('categories')->insert([
            'name' => "Beverages",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        DB::table('categories')->insert([
            'name' => "Meat",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        DB::table('categories')->insert([
            'name' => "Dairy",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        DB::table('categories')->insert([
            'name' => "Dry/Baking Goods ",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        DB::table('categories')->insert([
            'name' => "Personal Care",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        // Category::factory(3)->create();
    }
}
