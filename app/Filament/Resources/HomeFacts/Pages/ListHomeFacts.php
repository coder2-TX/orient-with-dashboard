<?php

namespace App\Filament\Resources\HomeFacts\Pages;

use App\Filament\Resources\HomeFacts\HomeFactResource;
use App\Models\HomeFact;
use Filament\Resources\Pages\ListRecords;

class ListHomeFacts extends ListRecords
{
    protected static string $resource = HomeFactResource::class;

    public function mount(): void
    {
        HomeFact::firstOrCreateDefault();

        parent::mount();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
