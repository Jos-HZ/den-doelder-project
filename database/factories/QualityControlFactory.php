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
        $order = Order::all()->random();

        return [
            'ordernumber' => $order->id,
            'production_line_id' => $order->production_line_id,
            'name_pallet' => $this->faker->word,
            'time' => $this->faker->time(),
            'def_nr' => $this->faker->boolean,
            'action' => $this->faker->sentence,
            'deviation' => $this->faker->word,
            'extra_info' => $this->faker->sentence,
        ];
    }
}
