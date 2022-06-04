<?php

namespace Tests\Feature\User;

use App\Models\User;
use App\Notifications\User\UserConfirmEmailNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function it_should_be_able_to_register_as_a_new_user()
    {
        Notification::fake();

        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => 'password',
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertOk();

        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        Notification::assertSentTo([User::query()->where('email', $data['email'])->first()], UserConfirmEmailNotification::class);
    }

    /**
     * @test
     */
    public function it_should_not_be_able_to_register_as_a_new_user_if_the_email_is_already_taken()
    {
        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'email' => $user['email'],
            'password' => 'password',
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertStatus(400);

        $this->assertDatabaseMissing('users', $data);
    }

    /**
     * @test
     */
    public function it_should_not_be_able_to_register_as_a_new_user_if_the_email_is_not_valid()
    {
        $data = [
            'name' => $this->faker->name(),
            'email' => 'not-a-valid-email',
            'password' => 'password',
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertStatus(400);

        $this->assertDatabaseMissing('users', $data);
    }

    /**
     * @test
     */
    public function it_should_not_be_able_to_register_as_a_new_user_if_the_password_is_not_valid()
    {
        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => '',
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertStatus(400);

        $this->assertDatabaseMissing('users', $data);
    }

    /**
     * @test
     */
    public function it_should_not_be_able_to_register_as_a_new_user_if_the_name_is_not_valid()
    {
        $data = [
            'name' => '',
            'email' => $this->faker->email(),
            'password' => 'password',
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertStatus(400);

        $this->assertDatabaseMissing('users', $data);
    }
}
