<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $championship_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
class ChampionshipUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'championship_users';

    protected $fillable = [
        'championship_id',
        'user_id',
        'deleted_at',
    ];
}
