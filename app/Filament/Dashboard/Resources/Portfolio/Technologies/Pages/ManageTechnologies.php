<?php

namespace App\Filament\Dashboard\Resources\Portfolio\Technologies\Pages;

use App\Filament\Dashboard\Resources\Portfolio\Technologies\TechnologyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTechnologies extends ManageRecords
{
    protected static string $resource = TechnologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
