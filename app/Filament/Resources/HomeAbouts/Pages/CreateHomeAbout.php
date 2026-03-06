<?php

namespace App\Filament\Resources\HomeAbouts\Pages;

use App\Filament\Resources\HomeAbouts\HomeAboutResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeAbout extends CreateRecord
{
    protected static string $resource = HomeAboutResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
