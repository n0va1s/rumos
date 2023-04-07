<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lever;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lever>
 */
class LeverFactory extends Factory
{
    protected $model = Lever::class;

    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'person_id' => Person::factory(),
            'sender' => fake()->safeEmail(),
            'information' => fake()->paragraph(1),
        ];
    }
}
