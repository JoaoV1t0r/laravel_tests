<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChampionshipChart extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'championship_charts';

    protected $fillable = [
        'championship_id',
        'championship_user_id',
        'user_points',
        'user_assertions',
        'deleted_at',
    ];
}
