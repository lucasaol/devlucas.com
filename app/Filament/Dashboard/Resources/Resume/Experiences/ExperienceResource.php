<?php

namespace App\Filament\Dashboard\Resources\Resume\Experiences;

use App\Filament\Dashboard\Resources\Resume\Experiences\Pages\CreateExperience;
use App\Filament\Dashboard\Resources\Resume\Experiences\Pages\EditExperience;
use App\Filament\Dashboard\Resources\Resume\Experiences\Pages\ListExperiences;
use App\Filament\Dashboard\Resources\Resume\Experiences\Schemas\ExperienceForm;
use App\Filament\Dashboard\Resources\Resume\Experiences\Tables\ExperiencesTable;
use App\Models\Experience;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $recordTitleAttribute = 'job_title';

    protected static string | UnitEnum | null $navigationGroup = 'Resume';

    public static function form(Schema $schema): Schema
    {
        return ExperienceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExperiencesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExperiences::route('/'),
            'create' => CreateExperience::route('/create'),
            'edit' => EditExperience::route('/{record}/edit'),
        ];
    }
}
