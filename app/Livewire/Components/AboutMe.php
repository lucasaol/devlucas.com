<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\AboutMe as AboutMeModel;

class AboutMe extends Component
{

    public AboutMeModel $aboutMe;

    public function mount(): void
    {
        $this->aboutMe = AboutMeModel::first();
    }

    public function render(): View
    {
        return view('livewire.components.about-me');
    }

    public function placeholder(): View
    {
        return view('livewire.placeholder.skeleton.text-image');
    }
}
