<?php

namespace App\Filament\Dashboard\Resources\Portfolio\Projects;

use App\Filament\Dashboard\Resources\Portfolio\Projects\Pages\CreateProject;
use App\Filament\Dashboard\Resources\Portfolio\Projects\Pages\EditProject;
use App\Filament\Dashboard\Resources\Portfolio\Projects\Pages\ListProjects;
use App\Filament\Dashboard\Resources\Portfolio\Projects\Pages\ViewProject;
use App\Filament\Dashboard\Resources\Portfolio\Projects\Schemas\ProjectForm;
use App\Filament\Dashboard\Resources\Portfolio\Projects\Schemas\ProjectInfolist;
use App\Filament\Dashboard\Resources\Portfolio\Projects\Tables\ProjectsTable;
use App\Models\Project;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedServerStack;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string | UnitEnum | null $navigationGroup = 'Portfolio';

    public static function form(Schema $schema): Schema
    {
        return ProjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectsTable::configure($table);
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
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'view' => ViewProject::route('/{record}'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}
