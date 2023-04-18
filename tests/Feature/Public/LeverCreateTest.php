<?php

namespace Tests\Feature\Admin;

use App\Models\Lever;
use Database\Seeders\OptionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeverCreateTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;
    protected $seeder = OptionsSeeder::class;
        
    public function test_homepage_lever(): void
    {
        $response = $this->get('/levers/create');
        $response->assertStatus(200);
        $response->assertSee('Alavancas (passo 1/2)');
    }

    public function test_insert_lever(): void
    {
        $lever = Lever::factory()->create();
        $this->assertDatabaseCount('course_levers', 1);
        $this->assertModelExists($lever);
    }

    public function test_delete_lever(): void
    {
        $lever = Lever::factory()->create();
        $lever->delete();
        $this->assertModelMissing($lever);
    }
}
