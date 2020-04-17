<?php

namespace Tests\Feature;

use Tests\TestCase;

class OccupationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function occupation_data_endpoint()
    {
        $this->getJson('/api/master/occupations')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'sequence', 'title'],
                ],
            ]);
    }
}
