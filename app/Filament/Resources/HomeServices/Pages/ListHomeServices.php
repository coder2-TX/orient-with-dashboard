<?php

namespace App\Filament\Resources\HomeServices\Pages;

use App\Filament\Resources\HomeServices\HomeServiceResource;
use App\Models\HomeService;
use Filament\Resources\Pages\ListRecords;

class ListHomeServices extends ListRecords
{
    protected static string $resource = HomeServiceResource::class;

    public function mount(): void
    {
        HomeService::firstOrCreateDefault();

        parent::mount();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
