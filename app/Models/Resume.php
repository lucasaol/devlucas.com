<?php

namespace App\Models;

use Database\Factories\ResumeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    /** @use HasFactory<ResumeFactory> */
    use HasFactory;

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
