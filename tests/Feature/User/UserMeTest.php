<?php

namespace Tests\Feature\User;

use App\Models\User;
use Tests\TestCase;

class UserMeTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function user_can_get_user_me_data(): void
    {
        $user = User::factory()->createOne();

        $this->actingAs($user, 'jwt');

        $response = $this->get(route('user.me'));

        $response->assertOk();

        $response->assertJsonStructure([
            'data' => [
                'uuid',
                'name',
                'email',
                'email_verified_at',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function user_can_not_get_user_me_data_when_not_authenticated(): void
    {
        $response = $this->get(route('user.me'));

        $response->assertUnauthorized();
    }
}
