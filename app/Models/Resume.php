<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{

    public $table = 'resume';

    protected $fillable = [
        'name',
        'position',
        'picture',
        'summary',
        'phone',
        'email',
        'website',
        'location'
    ];
}
