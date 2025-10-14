<?php

namespace App\Filament\Pages;

use App\Models\Resume;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class EditResumeHeader extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected string $view = 'filament.pages.edit-resume';

    protected static string | UnitEnum | null $navigationGroup = 'Resume';

    public ?array $data = null;


    public function mount(): void
    {
        $record = Resume::firstOrFail();
        $this->data = $record->toArray();
        $this->form->fill($this->data);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(['lg' => 3])
            ->components([
                Group::make()->columnSpan(['lg' => 2])->schema([
                    Section::make()->columns(2)
                    ->schema([
                        Group::make()
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(50),

                                TextInput::make('position')
                                    ->maxLength(50)
                            ]),
                        Group::make()
                            ->schema([
                                FileUpload::make('picture')
                                    ->image()
                                    ->avatar()
                                    ->directory('resume')
                            ]),
                        TextArea::make('summary')
                            ->columnSpanFull()
                            ->autosize()
                    ])
                ]),
                Group::make()->columnSpan(['lg' => 1])->schema([
                    Section::make()->schema([
                        TextInput::make('phone')
                            ->maxLength(255)
                            ->prefixIcon(Heroicon::OutlinedPhone),
                        TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->prefixIcon(Heroicon::OutlinedEnvelope),
                        TextInput::make('website')
                            ->url()
                            ->maxLength(255)
                            ->prefixIcon(Heroicon::GlobeAlt),
                        TextInput::make('location')
                            ->maxLength(255)
                            ->prefixIcon(Heroicon::OutlinedMapPin)
                    ])
                ])
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $validated = $this->form->getState();

        $record = Resume::firstOrFail();
        $record->update($validated);

        Notification::make()
            ->title('Informações atualizadas com sucesso!')
            ->success()
            ->send();
    }

}
