<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ListUsersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testURLUsersResponse()
    {
        $response = $this->get('/users');

        $response->assertOk();
    }

    public function testUsersEmpty()
    {
        $response = $this->getJson('/users');

        $response->assertHeader('Content-Type', 'application/json');

        $response->assertExactJson([
            'users' => [],
        ]);
    }

    public function testUserExist()
    {
        /** @var Collection $users */
        $users = factory(User::class, 10)->create();

        $response = $this->getJson('/users');

        $response->assertHeader('Content-Type', 'application/json');

        $expUsers = $users->map->only(['name', 'email'])->toArray();
        $actUsers = $response->json('users');

        $this->assertEquals($expUsers, $actUsers);
    }

    public function testUserGotDeleted() {
        $user = factory(User::class)->create();

        $res = $this->deleteJson("/users/$user->id");

        $res->assertStatus(204)
            ->assertNoContent();

        $this->assertEquals(0, User::count());

    }
}
