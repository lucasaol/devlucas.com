<?php

namespace App\Filament\Dashboard\Resources\Resume\Languages\Pages;

use App\Filament\Dashboard\Resources\Resume\Languages\LanguageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageLanguages extends ManageRecords
{
    protected static string $resource = LanguageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
