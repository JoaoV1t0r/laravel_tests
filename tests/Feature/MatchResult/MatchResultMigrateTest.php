<?php

namespace Tests\Feature\MatchResult;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MatchResultMigrateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_table_exists(): void
    {
        $this->assertTrue(
            Schema::hasTable('match_results')
        );
    }

    /**
     * @test
     */
    public function it_should_columns_exists(): void
    {
        $this->assertTrue(
            Schema::hasColumns('match_results', [
                'id',
                'championship_match_id',
                'team_gols',
                'opponent_gols',
                'created_at',
                'updated_at',
                'deleted_at',
            ])
        );
    }
}
