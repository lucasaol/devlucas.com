<?php

namespace App\Livewire\Pages;

use App\Livewire\Page;
use App\Models\AboutMe;

class HomePage extends Page
{

    protected string $view = 'livewire.pages.home';

    protected string $title;

    public function mount(): void
    {
        $aboutMe = AboutMe::first();
        $this->title = "{$aboutMe->title} - {$aboutMe->caption}";
    }
}
