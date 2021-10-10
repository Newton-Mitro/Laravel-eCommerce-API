<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subcategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subcategory_name' => $this->faker->words(3,true),
            'subcategory_discription' => $this->faker->paragraph(3,true),
            'subcategory_image_url' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
            'category_id' => function ()
            {
                return Category::all()->random();
            },
        ];
    }
}
