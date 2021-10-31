<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'review' => $this->faker->paragraph(3, true),
            'star_rating' => $this->faker->numberBetween(1, 5),
            'user_id' => function () {
                return User::all()->random();
            },
            'product_id' => function () {
                return Product::all()->random();
            },
        ];
    }
}
