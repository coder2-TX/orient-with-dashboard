<?php

namespace App\Filament\Resources\HomeAbouts\Pages;

use App\Filament\Resources\HomeAbouts\HomeAboutResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeAbouts extends ListRecords
{
    protected static string $resource = HomeAboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
