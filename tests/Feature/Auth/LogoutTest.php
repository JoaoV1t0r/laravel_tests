<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function user_can_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'jwt');

        $response = $this->post('/api/logout');


        $response->assertOk();

        $this->assertGuest('api');
    }

    /**
     * @test
     *
     * @return void
     */
    public function user_can_not_logout_when_not_authenticated(): void
    {
        $response = $this->post('/api/logout');

        $response->assertUnauthorized();
    }
}
