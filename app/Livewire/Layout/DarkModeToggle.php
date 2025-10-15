<?php

namespace App\Livewire\Layout;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class DarkModeToggle extends Component
{

    public bool $dark = false;

    public function mount(): void
    {
        $this->dark = session('dark_mode', false);
    }

    public function updatedDark($value): void
    {
        session(['dark_mode' => $value]);
        $this->dispatch('dark-toggled', dark: $value);
    }

    public function render(): View
    {
        return view('livewire.layout.dark-mode-toggle');
    }
}
