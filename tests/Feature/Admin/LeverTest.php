<?php

namespace Tests\Feature\Admin;

use App\Models\Lever;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeverTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_homepage_lever(): void
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/levers');
        $response->assertStatus(200);
        $response->assertSee('Alavancas');
    }

    public function test_list_levers(): void
    {
        Lever::factory()->count(100)->create();
        $this->assertDatabaseCount('course_levers', 100);
    }
}
