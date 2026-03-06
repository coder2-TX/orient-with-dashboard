<?php

namespace App\Filament\Resources\PartnersTrusts\Pages;

use App\Filament\Resources\PartnersTrusts\PartnersTrustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPartnersTrust extends EditRecord
{
    protected static string $resource = PartnersTrustResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
