<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'match_results';

    protected $fillable = [
        'championship_match_id',
        'team_gols',
        'opponent_gols',
        'deleted_at',
    ];

    public function championshipMatch()
    {
        return $this->belongsTo(ChampionshipMatch::class);
    }
}
