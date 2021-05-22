<?php

namespace Database\Factories;

use App\Models\Voivodship;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoivodshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voivodship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement($array = array ('dolnoslaskie', 'kujawsko-pomorskie', 'lubelskie', 'lubuskie', 'lodzkie', 'malopolskie', 'mazowieckie', 'opolskie', 'podkarpackie', 'pomorskie', 'slaskie', 'swietokrzyskie', 'warminsko-mazurskie,', 'zachodniopomorskie', 'wielkoplskie', 'podlaskie')),
        ];
    }
}
