<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RumoTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_homepage_rumo(): void
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/rumos');
        $response->assertStatus(200);
        $response->assertSee('Rumos');
    }

   
}
