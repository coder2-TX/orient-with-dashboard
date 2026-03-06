<?php

namespace App\Filament\Resources\HomePartners\Pages;

use App\Filament\Resources\HomePartners\HomePartnerResource;
use Filament\Resources\Pages\EditRecord;

class EditHomePartner extends EditRecord
{
    protected static string $resource = HomePartnerResource::class;

    protected function getRedirectUrl(): string
    {
        return static::$resource::getUrl('index');
    }
}
