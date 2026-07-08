<?php

namespace App\Filament\Resources\AboutOrientYemens\Pages;

use App\Filament\Resources\AboutOrientYemens\AboutOrientYemenResource;
use Filament\Resources\Pages\EditRecord;

class EditAboutOrientYemen extends EditRecord
{
    protected static string $resource = AboutOrientYemenResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}