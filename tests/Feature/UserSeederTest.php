<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSeederTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function it_should_user_seeder_exists(): void
    {
        $this->assertFileExists(base_path('database/seeders/UserSeeder.php'));
    }
}
