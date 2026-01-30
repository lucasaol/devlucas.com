<?php

namespace App\Http\Controllers\Api;

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

}
