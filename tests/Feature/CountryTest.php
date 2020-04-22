<?php

namespace Tests\Feature;

use App\Country;
use Tests\TestCase;

class CountryTest extends TestCase
{
    protected $country_json_structure = [
        "id",
        "name",
        "code",
        "status",
    ];

    public function setUp(): void
    {
        parent::setUp();

        $this->countries = factory(Country::class, 3)->create();
    }

    /** @test */
    public function can_list()
    {
        $this->getJson('/api/master/countries')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->country_json_structure,
                ]
            ])
        ;
    }

    /** @test */
    public function can_list_search_name()
    {
        $this->getJson('/api/master/countries?search='.$this->countries[1]->name)
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->country_json_structure,
                ]
            ])
            ->assertJsonCount(1, 'data');
        ;
    }

    /** @test */
    public function can_list_search_code()
    {
        $this->getJson('/api/master/countries?search='.$this->countries[1]->code)
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->country_json_structure,
                ]
            ])
            ->assertJsonCount(1, 'data');
        ;
    }
}
