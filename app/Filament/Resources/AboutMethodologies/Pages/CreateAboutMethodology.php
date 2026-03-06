<?php

namespace App\Filament\Resources\AboutMethodologies\Pages;

use App\Filament\Resources\AboutMethodologies\AboutMethodologyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutMethodology extends CreateRecord
{
    protected static string $resource = AboutMethodologyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
