<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageable = [
            'App\Models\Post',
            'App\Models\Shop',
        ];

        return [
            'url' => $this->faker->imageUrl(480, 320),
            'imageable_id' => $this->faker->numberBetween(1, 89),
            'imageable_type' => $this->faker->randomElement($imageable),
        ];
    }
}
