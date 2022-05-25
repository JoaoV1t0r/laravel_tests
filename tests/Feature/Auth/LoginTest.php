<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     *
     * @return void
     */
    public function it_should_login_success(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertOk();

        $this->assertAuthenticatedAs($user, 'api');

        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_in',
        ]);
        $user->delete();
    }
}
