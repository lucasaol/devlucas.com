<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $fillable = [
        'title',
        'school_name',
        'started_at',
        'finished_at'
    ];
}
