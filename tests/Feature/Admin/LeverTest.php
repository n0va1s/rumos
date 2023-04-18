<?php

namespace Tests\Feature\Admin;

use App\Models\Lever;
use App\Models\User;
use Database\Seeders\CourseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        $this->seed();
        $this->assertDatabaseCount('course_levers', 200);
    }
}
