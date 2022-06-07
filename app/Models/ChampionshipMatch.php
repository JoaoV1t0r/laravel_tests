<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
