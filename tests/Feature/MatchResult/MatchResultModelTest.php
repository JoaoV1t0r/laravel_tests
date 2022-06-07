<?php

namespace Tests\Feature\MatchResult;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatchResultModelTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_match_result_model_exists()
    {
        $this->assertTrue(class_exists('App\Models\MatchResult'));
    }

    /**
     * @test
     */
    public function it_should_match_result_model_has_soft_deletes()
    {
        $this->assertTrue(method_exists('App\Models\MatchResult', 'bootSoftDeletes'));
    }

    /**
     * @test
     */
    public function it_should_match_result_model_has_fillable()
    {
        $this->assertTrue(property_exists('App\Models\MatchResult', 'fillable'));
    }

    /**
     * @test
     */
    public function it_should_match_result_model_has_table()
    {
        $this->assertTrue(property_exists('App\Models\MatchResult', 'table'));
    }

    /**
     * @test
     */
    public function it_should_create_factory(): void
    {
        $matchResult = \App\Models\MatchResult::factory()->create();

        $this->assertDatabaseHas('match_results', [
            'id' => $matchResult->id,
        ]);
    }

    /**
     * @test
     */
    public function it_should_match_result_model_has_relationships_with_championship_match_model()
    {
        $relashionship = (new \App\Models\MatchResult())->championshipMatch();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $relashionship);
    }
}
