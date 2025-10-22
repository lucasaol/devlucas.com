<?php

namespace App\Livewire\Pages;

use App\Livewire\Page;
use App\Models\User;
use App\Notifications\NewContact;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Contact extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'livewire.pages.contact';

    protected string $title = 'Contato';

    public ?array $data = [];

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                    TextInput::make('name')
                        ->label(__('Nome'))
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')
                        ->label(__('E-mail'))
                        ->required()
                        ->maxLength(255)
                        ->email(),
                    TextArea::make('message')
                        ->label(__('Mensagem'))
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull()
                    ->rows(4)
            ])
            ->statePath('data');
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        User::first()->notify(
            new NewContact($data)
        );

        session()->flash('message', 'Sua mensagem foi enviada com sucesso!');
        $this->form->fill([]);
    }
}
