<?php

namespace Database\Factories;

use App\Models\Championship;
use App\Models\ChampionshipMatch;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChampionshipMatch>
 */
class ChampionshipMatchFactory extends Factory
{
    protected $model = \App\Models\ChampionshipMatch::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'championship_id' => Championship::all()->first()->id ?? Championship::factory()->create()->id,
            'team_id' => Team::all()->first()->id ?? Team::factory()->create()->id,
            'opponent_id' => Team::all()[1]->id ?? Team::factory()->create()->id,
        ];
    }
}
