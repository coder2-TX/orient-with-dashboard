<?php

namespace App\Filament\Resources\PartnersHeroes\Pages;

use App\Filament\Resources\PartnersHeroes\PartnersHeroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPartnersHeroes extends ListRecords
{
    protected static string $resource = PartnersHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
