<?php

namespace App\Filament\Resources\AboutOrientYemens\Pages;

use App\Filament\Resources\AboutOrientYemens\AboutOrientYemenResource;
use App\Models\AboutOrientYemen;
use Filament\Resources\Pages\ListRecords;

class ListAboutOrientYemens extends ListRecords
{
    protected static string $resource = AboutOrientYemenResource::class;

    public function mount(): void
    {
        parent::mount();

        AboutOrientYemen::firstOrCreateDefault();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}