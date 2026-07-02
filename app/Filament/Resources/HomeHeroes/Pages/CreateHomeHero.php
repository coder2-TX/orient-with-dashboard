<?php

namespace App\Filament\Resources\HomeHeroes\Pages;

use App\Filament\Resources\HomeHeroes\HomeHeroResource;
use App\Models\HomeHero;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeHero extends CreateRecord
{
    protected static string $resource = HomeHeroResource::class;

    public function mount(): void
    {
        $this->redirect($this->getResource()::getUrl('edit', [
            'record' => HomeHero::firstOrCreateDefault(),
        ]));
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
