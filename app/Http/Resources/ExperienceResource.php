<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'jobTitle' => $this->job_title,
            'companyName' => $this->company_name,
            'location' => $this->location,
            'description' => $this->description,
            'startedAt' => $this->started_at,
            'finishedAt' => $this->finished_at
        ];
    }
}
