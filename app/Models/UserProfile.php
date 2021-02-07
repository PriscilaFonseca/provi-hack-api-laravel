<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = "users_profile";

    protected $hidden = [
        'id',
    ];

    protected $fillable = [
        'id_user',
        'avatar',
        'bio',
        'linkedin',
        'behance',
        'github',
        'stacks',
        'main_technology',
        'phone',
        'state',
        'medium',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'id_user');
    }
}
