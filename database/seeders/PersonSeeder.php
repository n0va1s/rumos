<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Person;
use App\Models\Record;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::factory(1000)->create();

        Address::factory(100)->create();

        Contact::factory(500)->create();

        Record::factory(10000)->create();
    }
}
