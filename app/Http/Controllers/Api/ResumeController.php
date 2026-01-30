<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EducationResource;
use App\Http\Resources\ExperienceResource;
use App\Http\Resources\LanguageResource;
use App\Http\Resources\ResumeResource;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Resume;
use Illuminate\Http\JsonResponse;

class ResumeController
{

    public function index(): JsonResponse
    {
        $resume = Resume::firstOrFail();
        $experiences = Experience::all()->sortByDesc('started_at');
        $educations = Education::all()->sortByDesc('started_at');
        $languages = Language::all();

        return response()->json([
            'information' => (new ResumeResource($resume)),
            'experiences' => ExperienceResource::collection($experiences),
            'education' => EducationResource::collection($educations),
            'languages' => LanguageResource::collection($languages),
            'createdAt' => $resume->created_at,
            'updatedAt' => $resume->updated_at,
        ]);
    }

}
