<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChallengeCompleted extends Model
{
    use HasFactory;

    protected $table = 'user_challenge_completed';

    protected $fillable = [
        'id_user',
        'id_challenge',
        'description',
        'used_techs',
        'link',
        'status'
    ];
}
