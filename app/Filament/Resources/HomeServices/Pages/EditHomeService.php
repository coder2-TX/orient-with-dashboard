<?php

namespace App\Filament\Resources\HomeServices\Pages;

use App\Filament\Resources\HomeServices\HomeServiceResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeService extends EditRecord
{
    protected static string $resource = HomeServiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
