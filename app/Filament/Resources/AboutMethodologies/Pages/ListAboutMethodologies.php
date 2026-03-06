<?php

namespace App\Filament\Resources\AboutMethodologies\Pages;

use App\Filament\Resources\AboutMethodologies\AboutMethodologyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAboutMethodologies extends ListRecords
{
    protected static string $resource = AboutMethodologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
