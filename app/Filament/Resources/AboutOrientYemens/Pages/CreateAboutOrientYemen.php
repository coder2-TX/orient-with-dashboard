<?php

namespace App\Filament\Resources\AboutOrientYemens\Pages;

use App\Filament\Resources\AboutOrientYemens\AboutOrientYemenResource;
use App\Models\AboutOrientYemen;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutOrientYemen extends CreateRecord
{
    protected static string $resource = AboutOrientYemenResource::class;

    public function mount(): void
    {
        $record = AboutOrientYemen::firstOrCreateDefault();

        $this->redirect(static::$resource::getUrl('edit', ['record' => $record]));
    }
}