<?php

namespace App\Filament\Resources\AboutVisionMissions\Pages;

use App\Filament\Resources\AboutVisionMissions\AboutVisionMissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutVisionMissions extends ListRecords
{
    protected static string $resource = AboutVisionMissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
