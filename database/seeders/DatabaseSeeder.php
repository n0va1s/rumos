<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithoutEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents, WithoutEvents;

    public function run()
    {
        $this->call(OptionsSeeder::class);
        $this->call(AdminSeeder::class);

        $this->call(UserSeeder::class);
        
        $this->call(GroupSeeder::class);

        $this->call(PersonSeeder::class);
        
        $this->call(CourseSeeder::class);
                
    }
}
