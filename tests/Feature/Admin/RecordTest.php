<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecordTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_homepage_record(): void
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/records');
        $response->assertStatus(200);
        $response->assertSee('Ficha de Inscrição');
    }

    public function test_list_records(): void
    {
        $this->seed();
        $this->assertDatabaseCount('person_records', 200);
    }
}
