<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicalCaseTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function can_list()
    {
        /**
         * @var \App\User $user
         */
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->getJson("/api/medical-cases")
            ->assertForbidden();

        $user->givePermissionTo('cases.list');

        $this->actingAs($user)
            ->getJson("/api/medical-cases")
            ->assertSuccessful();
    }
}
