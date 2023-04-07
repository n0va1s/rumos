<?php

namespace Database\Factories;

use App\Models\Leader;
use App\Models\Member;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'course_leader_id' => Leader::factory(),
            'person_id' => Person::factory(),
            'information' => fake()->paragraph(1),
        ];
    }
}
