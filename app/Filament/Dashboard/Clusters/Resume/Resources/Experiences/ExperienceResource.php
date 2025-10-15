<?php

namespace App\Filament\Dashboard\Clusters\Resume\Resources\Experiences;

use App\Filament\Dashboard\Clusters\Resume\Resources\Experiences\Pages\CreateExperience;
use App\Filament\Dashboard\Clusters\Resume\Resources\Experiences\Pages\EditExperience;
use App\Filament\Dashboard\Clusters\Resume\Resources\Experiences\Pages\ListExperiences;
use App\Filament\Dashboard\Clusters\Resume\Resources\Experiences\Schemas\ExperienceForm;
use App\Filament\Dashboard\Clusters\Resume\Resources\Experiences\Tables\ExperiencesTable;
use App\Filament\Dashboard\Clusters\Resume\ResumeCluster;
use App\Models\Experience;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $recordTitleAttribute = 'job_title';

    protected static ?string $cluster = ResumeCluster::class;

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
