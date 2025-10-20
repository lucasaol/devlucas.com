<?php

namespace App\Livewire\Pages;

use App\Livewire\Page;
use App\Models\AboutMe;

class AboutMePage extends Page
{

    protected string $view = 'livewire.pages.about-me';

    protected string $title;

    public AboutMe $aboutMe;

    public function mount(): void
    {
        $this->aboutMe = AboutMe::first();
        $this->title = "{$this->aboutMe->title} - {$this->aboutMe->caption}";
    }
}
