<?php

namespace App\Models;

use Database\Factories\AboutMeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{

    /** @use HasFactory<AboutMeFactory> */
    use HasFactory;

    protected $table = 'about_me';

    protected $fillable = [
        'title',
        'caption',
        'avatar',
        'introduction',
        'content',
        'picture'
    ];

}
