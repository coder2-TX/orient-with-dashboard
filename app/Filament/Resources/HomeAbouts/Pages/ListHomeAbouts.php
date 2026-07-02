<?php

namespace App\Filament\Resources\HomeAbouts\Pages;

use App\Filament\Resources\HomeAbouts\HomeAboutResource;
use App\Models\HomeAbout;
use Filament\Resources\Pages\ListRecords;

class ListHomeAbouts extends ListRecords
{
    protected static string $resource = HomeAboutResource::class;

    public function mount(): void
    {
        HomeAbout::firstOrCreateDefault();

        parent::mount();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
