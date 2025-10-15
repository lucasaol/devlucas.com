<?php

namespace App\Filament\Dashboard\Resources\Resume\Experiences\Pages;

use App\Filament\Dashboard\Resources\Resume\Experiences\ExperienceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExperience extends EditRecord
{
    protected static string $resource = ExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
