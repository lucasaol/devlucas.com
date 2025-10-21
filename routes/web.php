<?php

use App\Livewire\Pages\Resume;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\Portfolio;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', HomePage::class)->name('index');
Route::get('/projects', Portfolio::class)->name('portfolio.index');
Route::get('/resume', Resume::class)->name('resume');
Route::get('/contact', Contact::class)->name('contact');


Route::get('image/{path}', function ($path) {
    $disk = Storage::disk('local');
    if (!$disk->exists($path)) {
        abort(404);
    }
    return response()->file($disk->path($path));
})->where('path', '.*')->name('image');
