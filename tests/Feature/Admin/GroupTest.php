<?php

namespace Tests\Feature\Admin;

use App\Models\Group;
use App\Models\User;
use Database\Seeders\OptionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GroupTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    protected $seeder = OptionsSeeder::class;

    public function test_homepage_group(): void
    {
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/groups');
        $response->assertStatus(200);
        $response->assertSee('Reuniões de Grupo');
    }

    public function test_insert_group(): void
    {
        $group = Group::factory()->create();
        $this->assertDatabaseCount('groups', 1);
        $this->assertModelExists($group);
    }

    public function test_delete_group(): void
    {
        $group = Group::factory()->make();
        $group->delete();
        $this->assertModelMissing($group);
    }
}
