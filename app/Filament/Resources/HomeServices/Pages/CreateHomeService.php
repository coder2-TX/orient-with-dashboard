<?php

namespace App\Filament\Resources\HomeServices\Pages;

use App\Filament\Resources\HomeServices\HomeServiceResource;
use App\Models\HomeService;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeService extends CreateRecord
{
    protected static string $resource = HomeServiceResource::class;

    public function mount(): void
    {
        $record = HomeService::firstOrCreateDefault();

        $this->redirect(static::getResource()::getUrl('edit', ['record' => $record]));
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
