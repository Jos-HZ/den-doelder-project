<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class ErrorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->ordernumber,
            'time' => $this->faker->time(),
            'date' => $this->faker->date(),
            'description' => $this->faker->text(),
            'category' => $this->faker->randomElement(['mechanical', 'technical'])
        ];
    }
}
