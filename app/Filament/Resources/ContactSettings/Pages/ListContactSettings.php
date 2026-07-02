<?php

namespace App\Filament\Resources\ContactSettings\Pages;

use App\Filament\Resources\ContactSettings\ContactSettingResource;
use App\Models\ContactSetting;
use Filament\Resources\Pages\ListRecords;

class ListContactSettings extends ListRecords
{
    protected static string $resource = ContactSettingResource::class;

    public function mount(): void
    {
        ContactSetting::firstOrCreateDefault();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
