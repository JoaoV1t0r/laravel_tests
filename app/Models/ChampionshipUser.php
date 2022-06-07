<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
