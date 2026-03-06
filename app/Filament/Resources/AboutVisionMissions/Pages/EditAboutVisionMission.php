<?php

namespace App\Filament\Resources\AboutVisionMissions\Pages;

use App\Filament\Resources\AboutVisionMissions\AboutVisionMissionResource;
use Filament\Resources\Pages\EditRecord;

class EditAboutVisionMission extends EditRecord
{
    protected static string $resource = AboutVisionMissionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
