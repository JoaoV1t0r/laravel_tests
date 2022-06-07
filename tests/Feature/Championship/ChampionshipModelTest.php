<?php

namespace Tests\Feature\Championship;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChampionshipModelTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_championship_model_exists()
    {
        $this->assertTrue(class_exists('App\Models\Championship'));
    }

    /**
     * @test
     */
    public function it_should_championship_model_has_soft_deletes()
    {
        $this->assertTrue(method_exists('App\Models\Championship', 'bootSoftDeletes'));
    }

    /**
     * @test
     */
    public function it_should_championship_model_has_fillable()
    {
        $this->assertTrue(property_exists('App\Models\Championship', 'fillable'));
    }

    /**
     * @test
     */
    public function it_should_championship_model_has_table()
    {
        $this->assertTrue(property_exists('App\Models\Championship', 'table'));
    }

    /**
     * @test
     */
    public function it_should_create_factory(): void
    {
        $championship = \App\Models\Championship::factory()->create();

        $this->assertDatabaseHas('championships', [
            'id' => $championship->id,
        ]);
    }
}
