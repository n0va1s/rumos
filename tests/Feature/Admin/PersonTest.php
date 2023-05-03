<?php

namespace Tests\Feature\Admin;

use App\Models\Person;
use App\Models\User;
use Database\Seeders\OptionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_person(): void
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/people');
        $response->assertStatus(200);
        $response->assertSee('Cursistas e Membros');
    }

    public function test_insert_person(): void
    {
        $person = Person::factory()->create();
        $this->assertDatabaseCount('person', 1);
        $this->assertModelExists($person);
    }

    public function test_delete_person(): void
    {
        $person = Person::factory()->make();
        $person->delete();
        $this->assertDatabaseCount('person', 0);
    }
}
