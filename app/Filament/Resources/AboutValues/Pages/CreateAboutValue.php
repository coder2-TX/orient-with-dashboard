<?php

namespace App\Filament\Resources\AboutValues\Pages;

use App\Filament\Resources\AboutValues\AboutValueResource;
use App\Models\AboutValue;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutValue extends CreateRecord
{
    protected static string $resource = AboutValueResource::class;

    public function mount(): void
    {
        $record = AboutValue::firstOrCreateDefault();

        $this->redirect(static::$resource::getUrl('edit', ['record' => $record]));
    }
}
