<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Championship;
use App\Models\ChampionshipUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChampionshipUser>
 */
class ChampionshipUserFactory extends Factory
{
    protected $model = \App\Models\ChampionshipUser::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'championship_id' => Championship::all()->first()->id ?? Championship::factory()->create()->id,
            'user_id' => User::all()->first()->id ?? User::factory()->create()->id,
        ];
    }
}
