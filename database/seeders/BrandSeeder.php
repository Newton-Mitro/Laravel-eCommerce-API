<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('brands')->insert([
            'name' => "Pran",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        DB::table('brands')->insert([
            'name' => "ACI",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        DB::table('brands')->insert([
            'name' => "Fu-Wang",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        DB::table('brands')->insert([
            'name' => "Ispahani Foods",
            'discription' => $faker->paragraph(3,true),
            'image' => $faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ]);
        // Brand::factory(5)->create();
    }
}
