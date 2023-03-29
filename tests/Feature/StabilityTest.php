<?php

namespace Tests\Feature;

use Tests\TestCase;

class StabilityTest extends TestCase
{
    public function test_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_records(): void
    {
        $response = $this->get('/records/create');

        $response->assertStatus(200);
    }

    public function test_levers(): void
    {
        $response = $this->get('/levers/create');

        $response->assertStatus(200);
    }
}
