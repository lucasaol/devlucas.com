<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SocialMediaResource;
use App\Models\SocialMedia;
use Illuminate\Http\JsonResponse;

class SocialMediaController
{

    public function index(): JsonResponse
    {
        return response()->json(
            SocialMediaResource::collection(
                SocialMedia::all()->sortBy('order')
            )
        );
    }

}
