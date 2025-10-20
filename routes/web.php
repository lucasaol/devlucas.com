<?php

use App\Livewire\Pages\HomePage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', HomePage::class)->name('index');


Route::get('image/{path}', function ($path) {
    $disk = Storage::disk('local');
    if (!$disk->exists($path)) {
        abort(404);
    }
    return response()->file($disk->path($path));
})->where('path', '.*')->name('image');
