<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'person_id' => Person::factory(),
            'state_id' => fake()->numberBetween(48,73),
            'description' => fake()->paragraph(1),
            'number' => fake()->randomNumber(5),
            'city' => fake()->city(),
            'zipcode' => fake()->numerify('########'),
        ];
    }
}
