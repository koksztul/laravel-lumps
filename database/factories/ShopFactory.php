<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'ratio' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 20),
            'city_id' => $this->faker->numberBetween(1, 50),
            'address' => $this->faker->streetAddress(),
            'open_hrs_mo' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'open_hrs_tu' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'open_hrs_we' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'open_hrs_th' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'open_hrs_fr' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'open_hrs_sa' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'open_hrs_sn' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'type_of_purchase' => $this->faker->randomElement($array = array ('kg', 'valuation', 'both')),
            'day_of_delivery' => $this->faker->randomElement($array = array ('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday')),
            'cash' => $this->faker->numberBetween(0, 1),
            'card' => $this->faker->numberBetween(0, 1),
        ];
    }
}