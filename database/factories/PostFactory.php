<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1,10),
            'caption' => fake()->sentence(3),
            'body' => fake()->sentence(15),
            'image'=> 'https://source.unsplash.com/collection/928423/480x480'
        ];
    }
}