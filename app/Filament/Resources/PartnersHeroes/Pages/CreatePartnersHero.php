<?php

namespace App\Filament\Resources\PartnersHeroes\Pages;

use App\Filament\Resources\PartnersHeroes\PartnersHeroResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePartnersHero extends CreateRecord
{
    protected static string $resource = PartnersHeroResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
