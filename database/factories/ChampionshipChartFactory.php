<?php

namespace Database\Factories;

use App\Models\Championship;
use App\Models\ChampionshipUser;
use App\Models\ChampionshipChart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChampionshipChart>
 */
class ChampionshipChartFactory extends Factory
{
    protected $model = \App\Models\ChampionshipChart::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'championship_id' => Championship::all()->first()->id ?? Championship::factory()->create()->id,
            'championship_user_id' => ChampionshipUser::all()->first()->id ?? ChampionshipUser::factory()->create()->id,
            'user_points' => $this->faker->numberBetween(0, 100),
            'user_assertions' => $this->faker->numberBetween(0, 100)
        ];
    }
}
