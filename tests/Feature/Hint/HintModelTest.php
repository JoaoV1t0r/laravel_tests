<?php

namespace Tests\Feature\Hint;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HintModelTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_hint_model_exists()
    {
        $this->assertTrue(class_exists('App\Models\Hint'));
    }

    /**
     * @test
     */
    public function it_should_hint_model_has_soft_deletes()
    {
        $this->assertTrue(method_exists('App\Models\Hint', 'bootSoftDeletes'));
    }

    /**
     * @test
     */
    public function it_should_hint_model_has_fillable()
    {
        $this->assertTrue(property_exists('App\Models\Hint', 'fillable'));
    }

    /**
     * @test
     */
    public function it_should_hint_model_has_table()
    {
        $this->assertTrue(property_exists('App\Models\Hint', 'table'));
    }

    /**
     * @test
     */
    public function it_should_create_factory(): void
    {
        $hint = \App\Models\Hint::factory()->create();

        $this->assertDatabaseHas('hints', [
            'id' => $hint->id,
        ]);
    }

    /**
     * @test
     */
    public function it_should_hint_model_has_relationships_with_championship_match_model()
    {
        $relashionship = (new \App\Models\Hint())->championshipMatch();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $relashionship);
    }

    /**
     * @test
     */
    public function it_should_hint_model_has_relationships_with_championship_user_model()
    {
        $relashionship = (new \App\Models\Hint())->championshipUser();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $relashionship);
    }
}
