<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{

    protected $fillable = [
        'name',
        'image',
        'description',
        'order'
    ];

    public static function all($columns = ['*']): Collection
    {
        return self::query()
            ->orderBy('order', 'ASC')
            ->get($columns);
    }
}
