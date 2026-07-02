<?php

namespace App\Filament\Resources\AboutValues\Pages;

use App\Filament\Resources\AboutValues\AboutValueResource;
use App\Models\AboutValue;
use Filament\Resources\Pages\ListRecords;

class ListAboutValues extends ListRecords
{
    protected static string $resource = AboutValueResource::class;

    public function mount(): void
    {
        parent::mount();

        AboutValue::firstOrCreateDefault();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
