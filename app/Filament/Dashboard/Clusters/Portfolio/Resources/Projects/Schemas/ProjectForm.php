<?php

namespace App\Filament\Dashboard\Clusters\Portfolio\Resources\Projects\Schemas;

use App\Models\Project;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
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
            ->columns(['lg' => 3])
            ->components([
                Group::make()->columnSpan(['lg' => 2])->schema([
                    Section::make()->columns(2)->schema([
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
                        Toggle::make('is_highlighted')
                            ->label('Highlight in homepage')
                            ->default(false),
                    ]),
                    Section::make('Content')->schema([
                        Textarea::make('short_description')
                            ->required()
                            ->autosize(),
                        MarkdownEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                    ]),
                    Section::make('Gallery')
                        ->schema([
                            Repeater::make('gallery')
                                ->relationship('gallery')
                                ->hiddenLabel()
                                ->reorderable()
                                ->orderColumn('order')
                                ->schema([
                                    FileUpload::make('image')
                                        ->hiddenLabel()
                                        ->image()
                                        ->imageEditor()
                                        ->required()
                                        ->directory('project-gallery')
                                ])
                                ->grid(4)
                        ])
                        ->collapsible()
                ]),
                Group::make()->columnSpan(['lg' => 1])->schema([
                    Section::make('Status')->schema([
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        DateTimePicker::make('published_at')
                            ->label('Publishing date')
                            ->default(now())
                            ->required(),
                    ]),

                    Section::make('Stack')->schema([
                        Select::make('technologies')
                            ->relationship('stack', 'name')
                            ->multiple()
                            ->required()
                            ->preload()
                            ->label('Technologies')
                    ])
                ])
            ]);
    }
}
