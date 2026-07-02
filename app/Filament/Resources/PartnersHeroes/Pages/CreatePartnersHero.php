<?php

namespace App\Filament\Resources\PartnersHeroes\Pages;

use App\Filament\Resources\PartnersHeroes\PartnersHeroResource;
use App\Models\PartnersHero;
use Filament\Resources\Pages\CreateRecord;

class CreatePartnersHero extends CreateRecord
{
    protected static string $resource = PartnersHeroResource::class;

    public function mount(): void
    {
        $record = PartnersHero::firstOrCreateDefault();

        $this->redirect(static::$resource::getUrl('edit', ['record' => $record]));
    }
}
