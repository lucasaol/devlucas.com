<?php

namespace App\Http\Resources;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'introduction' => $this->introduction,
            'description' => $this->short_description,
            'url' => $this->url ?? null,
            'githubUrl' => $this->github_url ?? null,
            'content' => $this->content,
            'gallery' => $this->whenLoaded('gallery', function () {
                return $this->gallery->map(function (Image $item) {
                    return route('image', ['path' => $item->image]);
                });
            }),
            'stack' => TechnologyResource::collection($this->whenLoaded('stack')),
            'highlighted' => (bool)$this->is_highlighted,
            'published' => (bool)$this->is_published,
            'publishedAt' => $this->published_at ?? null
        ];
    }
}
