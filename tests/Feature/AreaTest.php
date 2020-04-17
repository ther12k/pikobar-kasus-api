<?php

namespace Tests\Feature;

use App\Area;
use App\Hospital;
use Tests\TestCase;

class AreaTest extends TestCase
{
    /** @var \App\Area */
    protected $area_jabar;

    protected $areas_json_structure = [
        "id",
        "parent_id",
        "name",
        "depth",
        "code_bps",
        "code_dinkes",
        "code_kemendagri",
        "latitude",
        "longitude",
        "meta",
        "status",
        "updated_at",
        "created_at",
    ];

    public function setUp(): void
    {
        parent::setUp();

        $this->area_jabar = factory(Area::class)->create([
            'parent_id'       => null,
            'depth'           => 1,
            'name'            => 'Jawa Barat',
            'code_bps'        => '32',
            'code_kemendagri' => '32',
        ]);
        $this->area_jabar->children()->createMany(
            factory(Area::class, 3)->make()->toArray()
        );

        $this->hospital   = factory(Hospital::class)->create([
            'name'       => 'RS Hasan Sadikin',
            'kabkota_id' => $this->area_jabar->children[0]->id]);
        $this->hospital_2 = factory(Hospital::class)->create();
    }

    /** @test */
    public function area_data_endpoint()
    {
        $this->getJson('/api/master/areas')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->areas_json_structure,
                ],
            ]);
    }

    /** @test */
    public function area_data_endpoint_search_by_id()
    {
        $this->getJson("/api/master/areas?parent_id=1")
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->areas_json_structure,
                ],
            ])
            ->assertJsonCount(3, 'data');;
    }

    /** @test */
    public function area_data_endpoint_search_by_code_kemendagri()
    {
        $this->getJson("/api/master/areas?parent_code_kemendagri=32")
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->areas_json_structure,
                ],
            ])
            ->assertJsonCount(3, 'data');;
    }

    /** @test */
    public function area_data_endpoint_search_by_code_bps()
    {
        $this->getJson("/api/master/areas?parent_code_bps=32")
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->areas_json_structure,
                ],
            ])
            ->assertJsonCount(3, 'data');;
    }

    /** @test */
    public function area_data_detail_endpoint()
    {
        $this->getJson('/api/master/areas/' . $this->area_jabar->children[1]->id)
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => $this->areas_json_structure,
            ]);
    }
}
