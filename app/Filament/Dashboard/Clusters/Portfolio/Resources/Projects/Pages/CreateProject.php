<?php

namespace App\Filament\Dashboard\Clusters\Portfolio\Resources\Projects\Pages;

use App\Filament\Dashboard\Clusters\Portfolio\Resources\Projects\ProjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;
}
