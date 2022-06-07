<?php

namespace Tests\Feature\ChampionshipUser;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChampionshipUserMigrateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_table_exists(): void
    {
        $this->assertTrue(
            Schema::hasTable('championship_users')
        );
    }

    /**
     * @test
     */
    public function it_should_columns_exists(): void
    {
        $this->assertTrue(
            Schema::hasColumns('championship_users', [
                'id',
                'championship_id',
                'user_id',
                'created_at',
                'updated_at',
                'deleted_at',
            ])
        );
    }
}
