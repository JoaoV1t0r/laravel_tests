<?php

namespace Tests\Feature\ChampionshipMatch;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChampionshipMatchModelTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_championship_match_model_exists()
    {
        $this->assertTrue(class_exists('App\Models\ChampionshipMatch'));
    }

    /**
     * @test
     */
    public function it_should_championship_match_model_has_soft_deletes()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipMatch', 'bootSoftDeletes'));
    }

    /**
     * @test
     */
    public function it_should_championship_match_model_has_fillable()
    {
        $this->assertTrue(property_exists('App\Models\ChampionshipMatch', 'fillable'));
    }

    /**
     * @test
     */
    public function it_should_championship_match_model_has_table()
    {
        $this->assertTrue(property_exists('App\Models\ChampionshipMatch', 'table'));
    }

    /**
     * @test
     */
    public function it_should_create_factory(): void
    {
        $championshipMatch = \App\Models\ChampionshipMatch::factory()->create();

        $this->assertDatabaseHas('championship_matches', [
            'id' => $championshipMatch->id,
        ]);
    }

    /**
     * @test
     */
    public function it_should_championship_match_model_has_relationships_with_championship_model()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipMatch', 'championship'));
    }

    /**
     * @test
     */
    public function it_should_championship_match_model_has_relationships_with_match_result_model()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipMatch', 'matchResults'));
    }

    /**
     * @test
     */
    public function it_should_championship_match_model_has_relationships_with_team_model()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipMatch', 'team'));
    }

    /**
     * @test
     */
    public function it_should_championship_match_model_has_relationships_with_opponent_model()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipMatch', 'opponent'));
    }
}
