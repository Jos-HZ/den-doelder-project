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
            'ordernumber' => $this->faker->numberBetween(1111, 99999),
            'notes' => $this->faker->paragraph(10),
            'production_line' => Production::all()->random()->production_line,
            'driver_done' => 0
        ];
    }
}
