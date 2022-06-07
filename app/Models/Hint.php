<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $championship_match_id
 * @property int $championship_user_id
 * @property int $team_gols
 * @property int $opponent_gols
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
class Hint extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hints';

    protected $fillable = [
        'championship_match_id',
        'championship_user_id',
        'team_gols',
        'opponent_gols',
        'deleted_at',
    ];

    public function championshipMatch()
    {
        return $this->belongsTo(ChampionshipMatch::class);
    }

    public function championshipUser()
    {
        return $this->belongsTo(ChampionshipUser::class);
    }
}
