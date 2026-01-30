<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AboutMeResource;
use App\Models\AboutMe;
use Illuminate\Http\JsonResponse;

class AboutMeController
{

    public function index(): JsonResponse
    {
        return response()->json(
           new AboutMeResource(AboutMe::first())
        );
    }
}
