<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'introduction',
        'short_description',
        'url',
        'github_url',
        'is_highlighted',
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

    public static function highlights(int $count): Collection
    {
        return static::query()
            ->where('is_published', true)
            ->where('is_highlighted', true)
            ->orderBy('order', 'ASC')
            ->limit($count)
            ->get();
    }

    public static function published(): Collection
    {
        return static::query()
            ->where('is_published', true)
            ->orderBy('order', 'ASC')
            ->orderBy('published_at', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

}
