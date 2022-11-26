<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'name' => $this->faker->name(),
                'status' => $this->faker->numberBetween($min = 1, $max = 2),
                'description'=>$this->faker->sentence(),
            
        ];
    }
}
