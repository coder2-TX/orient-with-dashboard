<?php

namespace App\Filament\Resources\HomePartners\Pages;

use App\Filament\Resources\HomePartners\HomePartnerResource;
use App\Models\HomePartner;
use Filament\Resources\Pages\CreateRecord;

class CreateHomePartner extends CreateRecord
{
    protected static string $resource = HomePartnerResource::class;

    public function mount(): void
    {
        $record = HomePartner::firstOrCreateDefault();

        $this->redirect(static::$resource::getUrl('edit', ['record' => $record]));
    }
}
