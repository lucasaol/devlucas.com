<?php

namespace App\Models;

use App\Enums\Proficiency;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $fillable = [
        'name',
        'proficiency'
    ];

    protected $casts = [
        'proficiency' => Proficiency::class
    ];
}
