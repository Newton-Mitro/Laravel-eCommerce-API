<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductUnit;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->words(3,true),
            'product_discription' => $this->faker->paragraph(3,true),
            'stock' => $this->faker->numberBetween(1,10),
            'price' => $this->faker->numberBetween(50,1000),
            'discount' => $this->faker->numberBetween(5,20),
            'is_active' => $this->faker->boolean(),
            'product_image_url' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
            'category_id' => function ()
            {
                return Category::all()->random();
            },
            'subcategory_id' => function ()
            {
                return Subcategory::all()->random();
            },
            'brand_id' => function ()
            {
                return Brand::all()->random();
            },
            'product_unit_id' => function ()
            {
                return ProductUnit::all()->random();
            },
        ];
    }
}
