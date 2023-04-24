<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Leader;
use App\Models\Lever;
use App\Models\Member;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Contracts\CreatesTeams;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()
        ->count(20)
        ->hasPhoto(1)
        ->create();

        Leader::factory()->count(20)->create();

        Team::factory()->count(30)->create();

        Lever::factory()->count(100)->create();

        Member::factory()->count(30)->create();
    }
}
