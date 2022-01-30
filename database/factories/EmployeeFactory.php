<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
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
        'last_name' =>$this->faker->lastName(),
        'email' => $this->faker->unique()->freeEmail(),
        'phone' =>$this->faker->phoneNumber(),
        'company' =>$this->faker->numberBetween(1,10),
        ];
    }
}
