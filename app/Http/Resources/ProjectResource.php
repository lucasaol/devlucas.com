<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'details' => $this->slug,
            'introduction' => $this->introduction,
            'cover' => $this->whenLoaded('cover', fn() => route('image', ['path' => $this->cover->image]))
        ];
    }
}
