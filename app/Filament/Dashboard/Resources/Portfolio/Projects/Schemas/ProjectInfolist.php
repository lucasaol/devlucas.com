<?php

namespace App\Filament\Dashboard\Resources\Portfolio\Projects\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                IconEntry::make('is_published')
                    ->label('Published')
                    ->boolean(),
                TextEntry::make('published_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('introduction')
                    ->columnSpanFull(),
                TextEntry::make('url')
                    ->placeholder('-'),
                TextEntry::make('github_url')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                Section::make('Gallery')
                    ->schema([
                        RepeatableEntry::make('gallery')
                            ->schema([
                                ImageEntry::make('image')
                                    ->hiddenLabel()
                            ])
                            ->grid(4)
                            ->hiddenLabel()
                    ])
                    ->columnSpanFull()
                    ->collapsed(false)
            ]);
    }
}
