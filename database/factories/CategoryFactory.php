<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->words(2,true),
            'category_discription' => $this->faker->paragraph(3,true),
            'category_image_url' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
        ];
    }
}
