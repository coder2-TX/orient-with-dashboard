<?php

namespace App\Filament\Resources\HomeHeroes\Pages;

use App\Filament\Resources\HomeHeroes\HomeHeroResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeHero extends EditRecord
{
    protected static string $resource = HomeHeroResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
