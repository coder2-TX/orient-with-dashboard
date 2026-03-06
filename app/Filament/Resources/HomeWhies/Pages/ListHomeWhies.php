<?php

namespace App\Filament\Resources\HomeWhies\Pages;

use App\Filament\Resources\HomeWhies\HomeWhyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeWhies extends ListRecords
{
    protected static string $resource = HomeWhyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
