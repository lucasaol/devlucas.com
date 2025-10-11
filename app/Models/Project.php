<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'introduction',
        'url',
        'github_url',
        'content',
        'order'
    ];
}
