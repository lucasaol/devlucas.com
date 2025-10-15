<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

abstract class Page extends Component
{

    protected string $view;
    protected string $title;

    public function render(): View
    {
        return view($this->view)
            ->layout('layouts.default', [
                'title' => $this->title
            ]);
    }
}
