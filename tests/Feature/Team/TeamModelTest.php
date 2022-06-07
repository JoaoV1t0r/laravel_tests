<?php

namespace Tests\Feature\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamModelTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_team_model_exists()
    {
        $this->assertTrue(class_exists('App\Models\Team'));
    }

    /**
     * @test
     */
    public function it_should_team_model_has_soft_deletes()
    {
        $this->assertTrue(method_exists('App\Models\Team', 'bootSoftDeletes'));
    }

    /**
     * @test
     */
    public function it_should_team_model_has_fillable()
    {
        $this->assertTrue(property_exists('App\Models\Team', 'fillable'));
    }

    /**
     * @test
     */
    public function it_should_team_model_has_table()
    {
        $this->assertTrue(property_exists('App\Models\Team', 'table'));
    }

    /**
     * @test
     */
    public function it_should_create_factory(): void
    {
        $team = \App\Models\Team::factory()->create();

        $this->assertDatabaseHas('teams', [
            'id' => $team->id,
        ]);
    }
}
