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
            'name' => $this->faker->company(),
            'user_id' => $this->faker->numberBetween(1, 20),
            'city_id' => $this->faker->numberBetween(1, 1580),
            'address' => $this->faker->streetAddress(),
            'website' => $this->faker->url(),
            'information' => $this->faker->paragraph(20),
            'contact' => $this->faker->phoneNumber(),
            'open_hrs_mo' => $this->faker->time($format = 'H:i', $max = 'now') . ' - ' . $this->faker->time($format = 'H:i', $max = 'now'),
            'open_hrs_tu' => $this->faker->time($format = 'H:i', $max = 'now') . ' - ' . $this->faker->time($format = 'H:i', $max = 'now'),
            'open_hrs_we' => $this->faker->time($format = 'H:i', $max = 'now') . ' - ' . $this->faker->time($format = 'H:i', $max = 'now'),
            'open_hrs_th' => $this->faker->time($format = 'H:i', $max = 'now') . ' - ' . $this->faker->time($format = 'H:i', $max = 'now'),
            'open_hrs_fr' => $this->faker->time($format = 'H:i', $max = 'now') . ' - ' . $this->faker->time($format = 'H:i', $max = 'now'),
            'open_hrs_sa' => $this->faker->time($format = 'H:i', $max = 'now') . ' - ' . $this->faker->time($format = 'H:i', $max = 'now'),
            'open_hrs_sn' => $this->faker->time($format = 'H:i', $max = 'now') . ' - ' . $this->faker->time($format = 'H:i', $max = 'now'),
            'type_of_purchase' => $this->faker->randomElement($array = array ('kg', 'wycena', 'both')),
            'day_of_delivery' => $this->faker->randomElement($array = array ('poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota', 'niedziela')),
            'cash' => $this->faker->numberBetween(0, 1),
            'card' => $this->faker->numberBetween(0, 1),
        ];
    }
}