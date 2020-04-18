<?php

namespace Tests\Feature;

use App\Hospital;
use Tests\TestCase;

class HospitalTest extends TestCase
{
    protected $hospital_json_structure = [
        "id",
        "name",
        "address",
        "description",
        "phone_numbers",
    ];

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function can_show()
    {
        $hospital = factory(Hospital::class)->create();

        $this->getJson("/api/master/hospitals/{$hospital->id}")
            ->assertSuccessful()
            ->assertJsonStructure(['data' => ['id', 'name']])
        ;
    }

    /** @test */
    public function can_list()
    {
        factory(Hospital::class)->create();

        $this->getJson('/api/master/hospitals')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->hospital_json_structure,
                ]
            ])
        ;
    }

    /** @test */
    public function can_list_search_name()
    {
        factory(Hospital::class)->create(['name' => 'RS Hasan Sadikin']);

        $this->getJson('/api/master/hospitals?search=Hasan')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->hospital_json_structure,
                ]
            ])
            ->assertJsonCount(1, 'data');
        ;
    }
}
