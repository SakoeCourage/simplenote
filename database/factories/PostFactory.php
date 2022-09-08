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
    
           
        $color_ranges = array("#fed7aa","#84cc16","#818cf8","#fca5a5");


        return [
            'user_id' => mt_rand(1,10),
            'caption' => fake()->sentence(3),
            'body' => fake()->sentence(15),
            'image'=>  $color_ranges[mt_rand(0,count($color_ranges)-1)]
        ];
    }
}
