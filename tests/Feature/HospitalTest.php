<?php

namespace Tests\Feature;

use App\Area;
use App\Hospital;
use Tests\TestCase;

class HospitalTest extends TestCase
{
    protected $hospital_json_structure = [
        "id",
        "name",
        "address",
        "description",
        "kabkota_id",
        "kec_id",
        "kel_id",
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
//
//    /** @test */
//    public function hospital_data_endpoint()
//    {
//        $this->getJson('/api/master/hospitals')
//            ->assertSuccessful()
//            ->assertJsonStructure([
//                'data' => [
//                    '*' => $this->hospital_json_structure,
//                ]
//            ])
//        ;
//    }
//
//    /** @test */
//    public function hospital_data_search_endpoint()
//    {
//        $this->getJson('/api/master/hospitals?search=Hasan')
//            ->assertSuccessful()
//            ->assertJsonStructure([
//                'data' => [
//                    '*' => $this->hospital_json_structure,
//                ]
//            ])
//            ->assertJsonCount(1, 'data');
//        ;
//    }
//
//    /** @test */
//    public function hospital_data_detail_endpoint()
//    {
//        $this->getJson('/api/master/hospitals/'.$this->hospital->id)
//            ->assertSuccessful()
//            ->assertJsonStructure([
//                'data' => $this->hospital_json_structure,
//            ])
//        ;
//    }
}
