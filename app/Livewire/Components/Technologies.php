<?php

namespace App\Livewire\Components;

use App\Models\Technology;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Technologies extends Component
{

    public Collection $technologies;

    public function mount(): void
    {
        $this->technologies = Technology::all();
    }

    public function render(): View
    {
        return view('livewire.components.technologies');
    }

    public function placeholder(): View
    {
        return view('livewire.placeholder.skeleton.card-simple', [
            'count' => 4
        ]);
    }
}
