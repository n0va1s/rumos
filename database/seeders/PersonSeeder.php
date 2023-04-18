<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::factory()
        ->count(20)
        ->hasAddress(1)
        ->hasContacts(5)
        ->hasRecords(10)
        ->create();
    }
}
