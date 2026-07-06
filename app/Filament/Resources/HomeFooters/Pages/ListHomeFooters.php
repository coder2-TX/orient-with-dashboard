<?php

namespace App\Filament\Resources\HomeFooters\Pages;

use App\Filament\Resources\HomeFooters\HomeFooterResource;
use App\Models\HomeFooter;
use Filament\Resources\Pages\ListRecords;

class ListHomeFooters extends ListRecords
{
    protected static string $resource = HomeFooterResource::class;

    public function mount(): void
    {
        parent::mount();

        HomeFooter::firstOrCreateDefault();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}