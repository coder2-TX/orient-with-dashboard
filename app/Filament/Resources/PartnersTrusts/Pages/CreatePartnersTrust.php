<?php

namespace App\Filament\Resources\PartnersTrusts\Pages;

use App\Filament\Resources\PartnersTrusts\PartnersTrustResource;
use App\Models\PartnersTrust;
use Filament\Resources\Pages\CreateRecord;

class CreatePartnersTrust extends CreateRecord
{
    protected static string $resource = PartnersTrustResource::class;

    public function mount(): void
    {
        PartnersTrust::firstOrCreateDefault();

        $this->redirect(static::$resource::getUrl('index'));
    }
}
