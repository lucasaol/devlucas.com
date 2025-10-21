<?php

namespace App\Livewire\Components;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class CtaContactMe extends Component
{

    public function render(): View
    {
        return view('livewire.components.cta-contact-me');
    }

    public function placeholder(): View
    {
        return view('livewire.placeholder.skeleton.call-to-action');
    }
}
