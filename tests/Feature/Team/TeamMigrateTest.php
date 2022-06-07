<?php

namespace Tests\Feature\Team;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TeamMigrateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_should_create_table(): void
    {
        $this->assertTrue(
            Schema::hasTable('teams')
        );
    }

    /**
     * @test
     */
    public function it_should_columns_exists(): void
    {
        $this->assertTrue(
            Schema::hasColumns('teams', [
                'id',
                'name',
                'emblem',
                'created_at',
                'updated_at',
                'deleted_at',
            ])
        );
    }
}
