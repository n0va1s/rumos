<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    protected $model = Record::class;

    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'person_id' => Person::factory(),
            'presenter_id' => Person::factory(),
            'community_id' => fake()->numberBetween(14, 34),
            'reason' => fake()->paragraph(),
            'other_information' => fake()->paragraph(1),
            'has_agreement' => fake()->boolean(),
            'has_acceptance' => fake()->boolean(),
            'has_first_communion' => fake()->boolean(),
            'has_chrism' => fake()->boolean(),
            'is_approved' => fake()->boolean(),
        ];
    }
}
