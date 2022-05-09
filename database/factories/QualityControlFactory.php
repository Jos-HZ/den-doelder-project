<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class QualityControlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ordernumber' => Order::all()->random()->id,
//            TODO: fix this
//            'production_line_id' => Order::get()->first()->production_id,
            'production_line_id' => 1,
            'name_pallet' => $this->faker->word,
            'time' => $this->faker->time(),
            'def_nr' => $this->faker->boolean,
            'action' => $this->faker->sentence,
            'deviation' => $this->faker->word,
            'extra_info' => $this->faker->sentence,
        ];
    }
}
