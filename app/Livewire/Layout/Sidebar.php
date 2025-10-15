<?php

namespace App\Livewire\Layout;

use App\Models\AboutMe;
use App\Models\SocialMedia;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class Sidebar extends Component
{

    public Collection $socialMedia;
    public AboutMe $aboutMe;

    public function mount(): void
    {
        $this->socialMedia = SocialMedia::all();
        $this->aboutMe = AboutMe::first();
    }

    public function render(): View
    {
        return view('livewire.layout.sidebar');
    }
}
