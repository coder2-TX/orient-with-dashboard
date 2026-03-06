<?php

namespace App\Filament\Resources\HomeFooters\Pages;

use App\Filament\Resources\HomeFooters\HomeFooterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeFooter extends CreateRecord
{
    protected static string $resource = HomeFooterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
