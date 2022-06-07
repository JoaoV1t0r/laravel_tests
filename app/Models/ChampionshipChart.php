<?php

namespace App\Models;

use App\Models\Championship;
use App\Models\ChampionshipUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }

    public function championshipUser()
    {
        return $this->belongsTo(ChampionshipUser::class);
    }
}
