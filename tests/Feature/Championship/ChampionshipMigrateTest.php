<?php

namespace Tests\Feature\Championship;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChampionshipMigrateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_table_exists(): void
    {
        $this->assertTrue(
            Schema::hasTable('championships')
        );
    }

    /**
     * @test
     */
    public function it_should_columns_exists(): void
    {
        $this->assertTrue(
            Schema::hasColumns('championships', [
                'id',
                'name',
                'created_at',
                'updated_at',
                'deleted_at',
            ])
        );
    }
}
