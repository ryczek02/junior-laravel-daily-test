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
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'company_id' => $this->faker->numberBetween(1, \App\Models\Company::count()),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber()

        ];
    }
}
