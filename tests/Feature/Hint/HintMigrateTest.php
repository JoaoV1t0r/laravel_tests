<?php

namespace Tests\Feature\Hint;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HintMigrateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_table_exists(): void
    {
        $this->assertTrue(
            Schema::hasTable('hints')
        );
    }

    /**
     * @test
     */
    public function it_should_columns_exists(): void
    {
        $this->assertTrue(
            Schema::hasColumns('hints', [
                'id',
                'championship_match_id',
                'championship_user_id',
                'team_gols',
                'opponent_gols',
                'created_at',
                'updated_at',
                'deleted_at',
            ])
        );
    }
}
