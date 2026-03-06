<?php

namespace App\Filament\Resources\HomeFacts\Pages;

use App\Filament\Resources\HomeFacts\HomeFactResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeFact extends EditRecord
{
    protected static string $resource = HomeFactResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
