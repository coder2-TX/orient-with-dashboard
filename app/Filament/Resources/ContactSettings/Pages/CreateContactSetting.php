<?php

namespace App\Filament\Resources\ContactSettings\Pages;

use App\Filament\Resources\ContactSettings\ContactSettingResource;
use App\Models\ContactSetting;
use Filament\Resources\Pages\CreateRecord;

class CreateContactSetting extends CreateRecord
{
    protected static string $resource = ContactSettingResource::class;

    public function mount(): void
    {
        $record = ContactSetting::firstOrCreateDefault();

        $this->redirect($this->getResource()::getUrl('edit', ['record' => $record]));
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
