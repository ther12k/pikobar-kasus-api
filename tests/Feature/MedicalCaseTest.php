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
    public function cannot_list_without_permission()
    {
        /**
         * @var \App\User $user
         */
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->getJson("/api/medical-cases")
            ->assertForbidden();
    }

    /** @test */
    public function can_list()
    {
        /**
         * @var \App\User $user
         */
        $user = factory(User::class)->create();

        $user->givePermissionTo('cases.list');

        $this->actingAs($user)
            ->getJson("/api/medical-cases")
            ->assertSuccessful();
    }

    /** @test */
    public function cannot_create_without_permission()
    {
        /**
         * @var \App\User $user
         */
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->postJson("/api/medical-cases", [])
            ->assertForbidden();
    }
}
