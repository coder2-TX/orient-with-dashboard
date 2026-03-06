<?php

namespace App\Filament\Resources\PartnersTrusts\Pages;

use App\Filament\Resources\PartnersTrusts\PartnersTrustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPartnersTrusts extends ListRecords
{
    protected static string $resource = PartnersTrustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
