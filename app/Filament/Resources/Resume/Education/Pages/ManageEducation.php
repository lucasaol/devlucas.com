<?php

namespace App\Filament\Resources\Resume\Education\Pages;

use App\Filament\Resources\Resume\Education\EducationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageEducation extends ManageRecords
{
    protected static string $resource = EducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
