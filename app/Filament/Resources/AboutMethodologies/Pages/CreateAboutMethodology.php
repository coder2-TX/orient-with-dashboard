<?php

namespace App\Filament\Resources\AboutMethodologies\Pages;

use App\Filament\Resources\AboutMethodologies\AboutMethodologyResource;
use App\Models\AboutMethodology;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutMethodology extends CreateRecord
{
    protected static string $resource = AboutMethodologyResource::class;

    public function mount(): void
    {
        $record = AboutMethodology::firstOrCreateDefault();

        $this->redirect(static::$resource::getUrl('edit', ['record' => $record]));
    }
}
