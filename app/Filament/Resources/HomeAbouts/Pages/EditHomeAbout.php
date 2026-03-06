<?php

namespace App\Filament\Resources\HomeAbouts\Pages;

use App\Filament\Resources\HomeAbouts\HomeAboutResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeAbout extends EditRecord
{
    protected static string $resource = HomeAboutResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
