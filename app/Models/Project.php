<?php

namespace App\Models;

use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'introduction',
        'url',
        'github_url',
        'is_published',
        'published_at',
        'content',
        'order'
    ];

    public function stack(): BelongsToMany
    {
        return $this->belongsToMany(
            Technology::class,
            'project_stack',
            'project_id',
            'technology_id'
        )->withTimestamps();
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
