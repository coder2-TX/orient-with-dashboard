<?php

namespace App\Filament\Resources\HomeFooters\Pages;

use App\Filament\Resources\HomeFooters\HomeFooterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeFooters extends ListRecords
{
    protected static string $resource = HomeFooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
