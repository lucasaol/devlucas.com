<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TechnologyResource;
use App\Models\Technology;
use Illuminate\Http\JsonResponse;

class TechnologiesController
{

    public function index(): JsonResponse
    {
        return response()->json(
            TechnologyResource::collection(
                Technology::all()->sortBy('order')
            )
        );
    }

}
