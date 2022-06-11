<?php

namespace Database\Factories;

use App\Models\MatchResult;
use App\Models\ChampionshipChart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MatchResult>
 */
class MatchResultFactory extends Factory
{
    protected $model = \App\Models\MatchResult::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'championship_match_id' => ChampionshipChart::all()->first()->id ?? ChampionshipChart::factory()->create()->id,
            'team_gols' => $this->faker->numberBetween(0, 100),
            'opponent_gols' => $this->faker->numberBetween(0, 100),
        ];
    }
}
