<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'fullName'  => $this->faker->name(),
            'gender'    => $this->faker->shuffle([1, 2]),
            'address'   => $this->faker->address(),
            'phone'     => $this->faker->phoneNumber(),
            'avatar'    => $this->faker->imageUrl(640, 480, 'animals', true)
        ];
    }
}
