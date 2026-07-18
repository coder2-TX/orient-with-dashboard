<?php

namespace App\Filament\Resources\ContactHeroes\Pages;

use App\Filament\Resources\ContactHeroes\ContactHeroResource;
use Filament\Resources\Pages\EditRecord;

class EditContactHero extends EditRecord
{
    protected static string $resource =
        ContactHeroResource::class;

    protected function beforeFill(): void
    {
        $this->record->fillMissingDefaultText();
        $this->record->fillDefaultImagesIfEmpty();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
