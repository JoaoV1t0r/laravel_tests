<?php

namespace Tests\Feature\ChampionshipChart;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChampionshipChartMigrateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_table_exists(): void
    {
        $this->assertTrue(
            Schema::hasTable('championship_charts')
        );
    }

    /**
     * @test
     */
    public function it_should_columns_exists(): void
    {
        $this->assertTrue(
            Schema::hasColumns('championship_charts', [
                'id',
                'championship_id',
                'championship_user_id',
                'user_points',
                'user_assertions',
                'created_at',
                'updated_at',
                'deleted_at',
            ])
        );
    }
}
