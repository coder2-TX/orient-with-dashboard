<?php

namespace App\Filament\Resources\PartnersHeroes\Pages;

use App\Filament\Resources\PartnersHeroes\PartnersHeroResource;
use Filament\Resources\Pages\EditRecord;

class EditPartnersHero extends EditRecord
{
    protected static string $resource = PartnersHeroResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
