<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;

    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'community_id' => fake()->numberBetween(14,34),
            'frequency_id' => fake()->randomElement([43,44,]),
            'information'  => fake()->paragraph(3),
        ];
    }
}
