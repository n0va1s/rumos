<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Member;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()
        ->count(20)
        ->hasLevers(10)
        ->hasLeaders(10)
        ->hasTeams(10)
        ->hasPhoto(1)
        ->create();

        Member::factory()->count(50)->create();
    }
}
