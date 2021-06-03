<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $commentable = [
            'App\Models\Post',
            'App\Models\Shop',
        ];

        return [
            'body' => $this->faker->paragraph(5),
            'user_id' => $this->faker->numberBetween(1, 19),
            'commentable_id' => $this->faker->numberBetween(1, 3990),
            'commentable_type' => $this->faker->randomElement($commentable),
        ];
    }
}
