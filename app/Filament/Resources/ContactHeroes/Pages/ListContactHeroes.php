<?php

namespace App\Filament\Resources\ContactHeroes\Pages;

use App\Filament\Resources\ContactHeroes\ContactHeroResource;
use App\Models\ContactHero;
use Filament\Resources\Pages\ListRecords;

class ListContactHeroes extends ListRecords
{
    protected static string $resource = ContactHeroResource::class;

    public function mount(): void
    {
        parent::mount();

        ContactHero::firstOrCreateDefault();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}