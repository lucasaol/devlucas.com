<?php

use App\Http\Controllers\Api\SocialMediaController;
use App\Http\Controllers\Api\AboutMeController;
use Illuminate\Support\Facades\Route;

Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social');
Route::get('/about-me', [AboutMeController::class, 'index'])->name('about-me');
