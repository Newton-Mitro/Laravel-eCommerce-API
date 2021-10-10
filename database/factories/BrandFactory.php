<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_name' => $this->faker->words(3,true),
            'brand_discription' => $this->faker->paragraph(3,true),
            'brand_image_url' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ];
    }
}
