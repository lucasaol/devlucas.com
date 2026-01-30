<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProjectDetailsResource;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectsController
{

    public function index(): JsonResponse
    {
        return response()->json(
            ProjectResource::collection(
                Project::published()
            )
        );
    }

    public function highlights(): JsonResponse
    {
        return response()->json(
            ProjectResource::collection(
                Project::highlights(5)
            )
        );
    }

    public function show(string $slug): JsonResponse
    {
        $project = Project::with(['stack', 'gallery'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json(
            new ProjectDetailsResource($project)
        );
    }

}
