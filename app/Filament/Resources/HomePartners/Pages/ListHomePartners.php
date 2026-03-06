<?php

namespace App\Filament\Resources\HomePartners\Pages;

use App\Filament\Resources\HomePartners\HomePartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomePartners extends ListRecords
{
    protected static string $resource = HomePartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
