<?php

namespace App\Livewire\Components;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Projects extends Component
{

    public Collection $projects;

    public function mount(?int $count): void
    {
        if ($count) {
            $this->projects = Project::highlights($count);
        }
    }

    public function render(): View
    {
        return view('livewire.components.projects');
    }

    public function placeholder(): View
    {
        return view('livewire.placeholder.skeleton.card-image', [
            'count' => 3
        ]);
    }
}
