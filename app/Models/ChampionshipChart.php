<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $championship_id
 * @property int $championship_user_id
 * @property int $user_points
 * @property int $user_assertions
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
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
