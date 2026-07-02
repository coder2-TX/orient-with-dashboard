<?php

namespace App\Filament\Resources\AboutVisionMissions\Pages;

use App\Filament\Resources\AboutVisionMissions\AboutVisionMissionResource;
use App\Models\AboutVisionMission;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutVisionMission extends CreateRecord
{
    protected static string $resource = AboutVisionMissionResource::class;

    public function mount(): void
    {
        $record = AboutVisionMission::firstOrCreateDefault();

        $this->redirect($this->getResource()::getUrl('edit', ['record' => $record]));
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
