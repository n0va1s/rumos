<?php

namespace Tests\Feature\Admin;

use App\Models\Record;
use Database\Seeders\OptionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecordCreateTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;
    protected $seeder = OptionsSeeder::class;
        
    public function test_homepage_record(): void
    {
        $response = $this->get('/records/create');
        $response->assertStatus(200);
        $response->assertSee('Ficha de Inscrição');
    }

    public function test_insert_record(): void
    {
        $record = Record::factory()->create();
        $this->assertDatabaseCount('person_records', 1);
        $this->assertModelExists($record);
    }

    public function test_delete_record(): void
    {
        $record = Record::factory()->create();
        $record->delete();
        $this->assertModelMissing($record);
    }
}
