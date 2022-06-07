<?php

namespace Tests\Feature\ChampionshipUser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChampionshipUserModelTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_championship_user_model_exists()
    {
        $this->assertTrue(class_exists('App\Models\ChampionshipUser'));
    }

    /**
     * @test
     */
    public function it_should_championship_user_model_has_soft_deletes()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipUser', 'bootSoftDeletes'));
    }

    /**
     * @test
     */
    public function it_should_championship_user_model_has_fillable()
    {
        $this->assertTrue(property_exists('App\Models\ChampionshipUser', 'fillable'));
    }

    /**
     * @test
     */
    public function it_should_championship_user_model_has_table()
    {
        $this->assertTrue(property_exists('App\Models\ChampionshipUser', 'table'));
    }

    /**
     * @test
     */
    public function it_should_create_factory(): void
    {
        $championshipUser = \App\Models\ChampionshipUser::factory()->create();

        $this->assertDatabaseHas('championship_users', [
            'id' => $championshipUser->id,
        ]);
    }

    /**
     * @test
     */
    public function it_should_championship_user_model_has_relationships_with_championship_model()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipUser', 'championship'));
    }

    /**
     * @test
     */
    public function it_should_championship_user_model_has_relationships_with_user_model()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipUser', 'user'));
    }
}
