<?php

namespace Database\Factories;

use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "total_price" => "2890.00",
            "created_by" => function () {
                return User::all()->random();
            },
            "updated_by" => function () {
                return User::all()->random();
            },
            "order_status_id" => function () {
                return OrderStatus::all()->random();
            },
        ];
    }
}
