<?php

namespace App\Filament\Resources\HomeWhies\Pages;

use App\Filament\Resources\HomeWhies\HomeWhyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeWhy extends CreateRecord
{
    protected static string $resource = HomeWhyResource::class;

    public function mount(): void
    {
        $this->redirect($this->getResource()::getUrl('index'));
    }
}
