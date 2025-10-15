<?php

namespace App\Filament\Dashboard\Clusters\Resume\Resources\Education;

use App\Filament\Dashboard\Clusters\Resume\Resources\Education\Pages\ManageEducation;
use App\Filament\Dashboard\Clusters\Resume\ResumeCluster;
use App\Models\Education;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $cluster = ResumeCluster::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('school_name')
                    ->required()
                    ->maxLength(50),
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

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('school_name')
                    ->searchable(),
                TextColumn::make('started_at')
                    ->date('M, Y')
                    ->sortable(),
                TextColumn::make('finished_at')
                    ->date('M, Y')
                    ->sortable()
                    ->placeholder(' - '),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('started_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageEducation::route('/'),
        ];
    }
}
