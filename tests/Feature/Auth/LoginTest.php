<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

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
            'statusCode',
            'data' => [
                'access_token',
                'token_type',
                'expires_in',
            ],
            'message',
        ]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_should_login_fail(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'wrong_password',
        ]);

        $response->assertStatus(400);

        $this->assertGuest('api');

        $response->assertJsonStructure([
            'statusCode',
            'message',
        ]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_should_login_fail_when_email_not_exists(): void
    {
        $response = $this->post('/api/login', [
            'email' => 'notexists@test.com',
            'password' => 'password',
        ]);

        $response->assertStatus(400);

        $this->assertGuest('api');
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_should_login_fail_when_email_is_not_valid(): void
    {
        $response = $this->post('/api/login', [
            'email' => 'notvalidemail',
            'password' => 'password',
        ]);

        $response->assertStatus(400);

        $this->assertGuest('api');
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_should_login_fail_when_password_is_not_valid(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'wrong_password',
        ]);

        $response->assertStatus(400);

        $this->assertGuest('api');
    }
}
