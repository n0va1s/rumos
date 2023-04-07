<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Leader;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leader>
 */
class LeaderFactory extends Factory
{
    protected $model = Leader::class;

    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'person_id' => Person::factory(),
            'role_id' => fake()->numberBetween(35,40),
            'information' => fake()->paragraph(1),
        ];
    }
}
