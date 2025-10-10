<?php

namespace App\Filament\Pages;

use App\Models\AboutMe;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use UnitEnum;

class EditAboutMe extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static string | UnitEnum | null $navigationGroup = 'Info';

    protected static ?string $recordTitleAttribute = 'title';

    protected string $view = 'filament.pages.edit-about-me';

    public ?array $data = null;

    public function mount(): void
    {
        $record = AboutMe::firstOrFail();
        $this->data = $record->toArray();
        $this->form->fill($this->data);
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(50),
                TextInput::make('caption')
                ->maxLength(50),
                TextInput::make('introduction')
                    ->columnSpan(2)
                    ->maxLength(255),
                FileUpload::make('avatar')
                    ->image()
                    ->avatar()
                    ->required()
                    ->directory('about-me'),
                FileUpload::make('picture')
                    ->image()
                    ->directory('about-me'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpan(2)
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $validated = $this->form->getState();

        $record = AboutMe::firstOrFail();
        $record->update($validated);

        Notification::make()
            ->title('Informações atualizadas com sucesso!')
            ->success()
            ->send();
    }
}
