<?php

namespace Database\Factories;

use App\Models\ProductionLine;
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
            'pallettype' => $this->faker->randomElement(['KATOEN NATIE 1200 x 1000', 'BARRY CALLEBAUT 1200 x 1000', 'DUVEL 1200 x 900', '.UMICORE 1000 x 1000']),
            'palletnumber' => $this->faker->numberBetween(0, 3000),
            'notes' => $this->faker->paragraph(10),
            'production_line_id' => ProductionLine::all()->random()->id,
            'driver_done' => 0
        ];
    }
}
