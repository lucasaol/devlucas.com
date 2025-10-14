<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

    protected $fillable = [
        'job_title',
        'company_name',
        'location',
        'started_at',
        'finished_at',
        'description'
    ];
}
