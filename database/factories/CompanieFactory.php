<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'email'=> $this->faker->unique()->safeEmail(),
            'logo'=> $this->faker->imageUrl($width = 100, $height = 100),
            'website' =>$this->faker->url()
        ];
    }
}
