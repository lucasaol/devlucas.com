<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutMeResource extends JsonResource
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
            'caption' => $this->caption,
            'avatar' => $this->avatar ? route('image', ['path' => $this->avatar]) : null,
            'picture' => $this->picture ? route('image', ['path' => $this->picture])  : null,
            'introduction' => $this->introduction,
            'content' => $this->content
        ];
    }
}
