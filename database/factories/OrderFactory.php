<?php

namespace Database\Factories;

use App\Models\Production;
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
            'notes' => $this->faker->paragraph(10),
            'ordernumber' => $this->faker->numberBetween(1111, 99999),
            'production_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
