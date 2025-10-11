<?php

namespace App\Filament\Resources\Portfolio\Projects\Schemas;

use App\Models\Blog\Post;
use App\Models\Project;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Project::class, 'slug', ignoreRecord: true)
                            ->prefix(config('app.url') . '/'),
                        Textarea::make('introduction')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('url')
                            ->url()
                            ->maxLength(255)
                            ->prefixIcon(Heroicon::GlobeAlt),
                        TextInput::make('github_url')
                            ->url()
                            ->maxLength(255)
                            ->prefixIcon('fab-github'),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                    ])
                ->columns(2)
            ]);
    }
}
