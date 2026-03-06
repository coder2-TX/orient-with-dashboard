<?php

namespace App\Filament\Resources\AboutMethodologies\Pages;

use App\Filament\Resources\AboutMethodologies\AboutMethodologyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAboutMethodology extends EditRecord
{
    protected static string $resource = AboutMethodologyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()->label('حذف'),
        ];
    }
}
