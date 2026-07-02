<?php

namespace App\Filament\Resources\HomePartners\Pages;

use App\Filament\Resources\HomePartners\HomePartnerResource;
use App\Models\HomePartner;
use Filament\Resources\Pages\ListRecords;

class ListHomePartners extends ListRecords
{
    protected static string $resource = HomePartnerResource::class;

    public function mount(): void
    {
        parent::mount();

        HomePartner::firstOrCreateDefault();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
