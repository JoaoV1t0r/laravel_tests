<?php

namespace Tests\Feature\ChampionshipMatch;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChampionshipMatchMigrateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_table_exists(): void
    {
        $this->assertTrue(
            Schema::hasTable('championship_matches')
        );
    }

    /**
     * @test
     */
    public function it_should_columns_exists(): void
    {
        $this->assertTrue(
            Schema::hasColumns('championship_matches', [
                'id',
                'championship_id',
                'team_id',
                'opponent_id',
                'created_at',
                'updated_at',
                'deleted_at',
            ])
        );
    }
}
