<?php

namespace Tests\Feature;

use App\Area;
use Tests\TestCase;

class MasterDataTest extends TestCase
{
    /** @test */
    public function occupation_data_endpoint()
    {
        $this->getJson('/api/master/occupations')
        ->assertSuccessful()
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'sequence', 'title'],
            ] 
        ])
        ;
    }

    /** @test */
    public function hospital_data_endpoint()
    {
        $this->getJson('/api/master/hospitals')
        ->assertSuccessful()
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    "address",
                    "description",
                    "id",
                    "kabkota_id",
                    "kec_id",
                    "kel_id",
                    "name",
                    "phone_numbers",
                ],
            ] 
        ])
        ;
    }

    /** @test */
    public function area_data_endpoint()
    {
        $area_jabar = factory(Area::class)->make([
            'parent_id' => null,
            'depth' => 1,
            'name' => 'Jawa Barat',
            'code_bps' => '32',
            'code_kemendagri' => '32',
        ]);
        $area_jabar->children()->createMany(
            factory(Area::class, 3)->make()->toArray()
        );

        $this->getJson('/api/master/areas')
        ->assertSuccessful()
        ->assertJsonStructure([
            'data' => [
                '*' => [
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
                ],
            ] 
        ])
        ;
    }
}
