<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Member;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithoutEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents, WithoutEvents;

    public function run()
    {
        $this->call(OptionsSeeder::class);
        $this->call(AdminSeeder::class);

        User::factory()->count(50)->state(
            new Sequence (
                ['is_admin' => true],
                ['is_admin' => false],
            )
        )->create();
        
        $this->call(GroupSeeder::class);

        Person::factory()
        ->count(20)
        ->hasAddress(1)
        ->hasContacts(5)
        ->hasRecords(10)
        ->create();
        
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
