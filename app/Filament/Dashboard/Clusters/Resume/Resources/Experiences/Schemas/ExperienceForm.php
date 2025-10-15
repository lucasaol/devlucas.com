<?php

namespace App\Filament\Dashboard\Clusters\Resume\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Carbon;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('job_title')
                    ->required(),
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                Group::make()
                    ->columns(2)
                    ->schema([
                        DatePicker::make('started_at')
                            ->prefixIcon(Heroicon::OutlinedCalendarDays)
                            ->native(false)
                            ->reactive()
                            ->required()
                            ->closeOnDateSelection()
                            ->maxDate(fn (Get $get) => $get('finished_at') ? Carbon::parse($get('finished_at')) : now()),
                        DatePicker::make('finished_at')
                            ->prefixIcon(Heroicon::OutlinedCalendarDays)
                            ->native(false)
                            ->reactive()
                            ->closeOnDateSelection()
                            ->maxDate(now())
                            ->minDate(fn (Get $get) => $get('started_at') ?? Carbon::parse($get('started_at')))
                    ]),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
