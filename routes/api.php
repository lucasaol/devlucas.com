<?php

use App\Http\Controllers\Api\SocialMediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social');
