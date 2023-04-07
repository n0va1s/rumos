<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Person;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'person_id'=> Person::factory(),
            'team_id' => fake()->numberBetween(41,42),
            'information' => fake()->paragraph(1),
        ];
    }
}
