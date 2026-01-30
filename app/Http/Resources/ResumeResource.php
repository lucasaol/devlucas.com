<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResumeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'position' => $this->position,
            'summary' => $this->summary,
            'picture' =>  $this->picture ? route('image', ['path' => $this->picture]) : null,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'location' => $this->location,
        ];
    }
}
