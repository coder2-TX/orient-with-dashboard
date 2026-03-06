<?php

namespace App\Filament\Resources\HomeFacts\Pages;

use App\Filament\Resources\HomeFacts\HomeFactResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeFacts extends ListRecords
{
    protected static string $resource = HomeFactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
