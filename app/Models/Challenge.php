<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $table = 'challenge';

    protected $fillable = [
        'id',
        'title',
        'description',
        'id_area_expertise',
        'status'
    ];
}
