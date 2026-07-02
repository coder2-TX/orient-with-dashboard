<?php

namespace App\Filament\Resources\PartnersTrusts\Pages;

use App\Filament\Resources\PartnersTrusts\PartnersTrustResource;
use App\Models\PartnersTrust;
use Filament\Resources\Pages\ListRecords;

class ListPartnersTrusts extends ListRecords
{
    protected static string $resource = PartnersTrustResource::class;

    public function mount(): void
    {
        PartnersTrust::firstOrCreateDefault();

        parent::mount();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
