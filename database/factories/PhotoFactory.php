<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'url' => fake()->imageUrl(),
        ];
    }
}
