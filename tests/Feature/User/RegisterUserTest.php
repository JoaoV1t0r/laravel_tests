<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * @test
     */
    public function it_should_be_able_to_register_as_a_new_user()
    {
        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => 'password',
        ];
        $response = $this->post(route('user.store'), $data);

        $response->assertOk();

        $this->assertAuthenticatedAs(User::first(), 'api');

        $this->assertDatabaseHas('users', $data);
    }
}
