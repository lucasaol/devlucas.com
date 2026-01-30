<?php

use App\Http\Controllers\Api\ProjectsController;
use App\Http\Controllers\Api\SocialMediaController;
use App\Http\Controllers\Api\AboutMeController;
use App\Http\Controllers\Api\TechnologiesController;
use Illuminate\Support\Facades\Route;

Route::get('/social-media', [SocialMediaController::class, 'index'])->name('social.index');
Route::get('/about-me', [AboutMeController::class, 'index'])->name('about-me.index');
Route::get('/technologies', [TechnologiesController::class, 'index'])->name('technologies.index');

Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('/', [ProjectsController::class, 'index'])->name('index');
    Route::get('/highlights', [ProjectsController::class, 'highlights'])->name('highlights');
    Route::get('/{slug}', [ProjectsController::class, 'show'])->name('show');
});
