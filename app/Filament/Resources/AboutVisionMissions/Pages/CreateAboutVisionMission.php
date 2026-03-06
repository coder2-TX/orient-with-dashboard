<?php

namespace App\Filament\Resources\AboutVisionMissions\Pages;

use App\Filament\Resources\AboutVisionMissions\AboutVisionMissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutVisionMission extends CreateRecord
{
    protected static string $resource = AboutVisionMissionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
