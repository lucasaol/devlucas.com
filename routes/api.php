<?php

use App\Http\Controllers\Api\SocialMediaController;
use App\Http\Controllers\Api\AboutMeController;
use App\Http\Controllers\Api\TechnologiesController;
use Illuminate\Support\Facades\Route;

Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social');
Route::get('/about-me', [AboutMeController::class, 'index'])->name('about-me');
Route::get('/technologies', [TechnologiesController::class, 'index'])->name('technologies');
