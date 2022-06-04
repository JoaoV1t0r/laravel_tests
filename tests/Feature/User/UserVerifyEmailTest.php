<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserVerifyEmailTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function user_can_verify_email()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->assertNull($user->email_verified_at);

        $response = $this->get(route('users.confirm_email', $user->uuid));

        $this->assertNotNull($user->fresh()->email_verified_at);
    }

    /**
     * @test
     *
     * @return void
     */
    public function user_can_not_verify_email_when_already_verified()
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $this->assertNotNull($user->email_verified_at);

        $response = $this->get(route('users.confirm_email', $user->uuid));

        $this->assertNotNull($user->fresh()->email_verified_at);
    }

    /**
     * @test
     *
     * @return void
     */
    public function user_can_not_verify_email_when_uuid_is_invalid()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->assertNull($user->email_verified_at);

        $response = $this->get(route('users.confirm_email', 'invalid-uuid'));

        $this->assertNull($user->fresh()->email_verified_at);
    }

    /**
     * @test
     *
     * @return void
     */
    public function user_can_not_verify_email_when_uuid_is_not_found()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->assertNull($user->email_verified_at);

        $response = $this->get(route('users.confirm_email', 'not-found-uuid'));

        $this->assertNull($user->fresh()->email_verified_at);
    }

    /**
     * @test
     *
     * @return void
     */
    public function user_can_not_verify_email_when_uuid_is_empty()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->assertNull($user->email_verified_at);

        $response = $this->get(route('users.confirm_email', ''));

        $this->assertNull($user->fresh()->email_verified_at);
    }

    /**
     * @test
     *
     * @return void
     */
    public function user_can_not_verify_email_when_uuid_is_empty_string()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->assertNull($user->email_verified_at);

        $response = $this->get(route('users.confirm_email', ''));

        $this->assertNull($user->fresh()->email_verified_at);
    }
}
