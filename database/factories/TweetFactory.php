<?php

namespace Database\Factories;
// @var \Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;


class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => new UserFactory(),
            'body' => $this->faker->sentence()
        ];

    }
}
