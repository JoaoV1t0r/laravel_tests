<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $championship_id
 * @property int $team_id
 * @property int $opponent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
class ChampionshipMatch extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'championship_matches';

    protected $fillable = [
        'championship_id',
        'team_id',
        'opponent_id',
        'deleted_at',
    ];
}
