<?php

namespace App\Filament\Resources\AboutMethodologies\Pages;

use App\Filament\Resources\AboutMethodologies\AboutMethodologyResource;
use App\Models\AboutMethodology;
use Filament\Resources\Pages\ListRecords;

class ListAboutMethodologies extends ListRecords
{
    protected static string $resource = AboutMethodologyResource::class;

    public function mount(): void
    {
        parent::mount();

        AboutMethodology::firstOrCreateDefault();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
