<?php

namespace App\Filament\Resources\PartnersHeroes\Pages;

use App\Filament\Resources\PartnersHeroes\PartnersHeroResource;
use App\Models\PartnersHero;
use Filament\Resources\Pages\ListRecords;

class ListPartnersHeroes extends ListRecords
{
    protected static string $resource = PartnersHeroResource::class;

    public function mount(): void
    {
        parent::mount();

        PartnersHero::firstOrCreateDefault();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
