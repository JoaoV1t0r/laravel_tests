<?php

namespace Tests\Feature\ChampionshipChart;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChampionshipChartModelTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_championship_chart_model_exists()
    {
        $this->assertTrue(class_exists('App\Models\ChampionshipChart'));
    }

    /**
     * @test
     */
    public function it_should_championship_chart_model_has_soft_deletes()
    {
        $this->assertTrue(method_exists('App\Models\ChampionshipChart', 'bootSoftDeletes'));
    }

    /**
     * @test
     */
    public function it_should_championship_chart_model_has_fillable()
    {
        $this->assertTrue(property_exists('App\Models\ChampionshipChart', 'fillable'));
    }

    /**
     * @test
     */
    public function it_should_championship_chart_model_has_table()
    {
        $this->assertTrue(property_exists('App\Models\ChampionshipChart', 'table'));
    }

    /**
     * @test
     */
    public function it_should_create_factory(): void
    {
        $championshipChart = \App\Models\ChampionshipChart::factory()->create();

        $this->assertDatabaseHas('championship_charts', [
            'id' => $championshipChart->id,
        ]);
    }

    /**
     * @test
     */
    public function it_should_championship_chart_model_has_relationships_with_championship_model()
    {
        $relation = (new \App\Models\ChampionshipChart)->championship();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $relation);
    }

    /**
     * @test
     */
    public function it_should_championship_chart_model_has_relationships_with_championship_user_model()
    {
        $relation = (new \App\Models\ChampionshipChart)->championshipUser();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $relation);
    }
}
