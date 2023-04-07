<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'community_id' => fake()->numberBetween(14, 34),
            'type_id' => fake()->randomElement([45, 46]),
            'number' => fake()->randomNumber(5),
            'starts_at' => fake()->date(),
            'ends_at' => fake()->date(),
            'information' => fake()->paragraph(1),
        ];
    }
}
