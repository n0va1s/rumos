<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    protected $model = Person::class;

    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'other_group_id' => fake()->numberBetween(6, 9),
            'level_id' => fake()->numberBetween(10, 13),
            'gender_id' => fake()->randomElement([45, 46]),
            'community_id' => fake()->numberBetween(14, 34),
            'first_name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'phone' => fake()->phoneNumber(),
            'social' => fake()->url(),
            'birth_at' => fake()->date(),
            'father' => fake()->firstName('M'),
            'mother' => fake()->firstName('F'),
            'congregation' => fake()->word(),
            'college' => fake()->domainName(),
            'course' => fake()->word(),
            'company' => fake()->company(),
        ];
    }
}
