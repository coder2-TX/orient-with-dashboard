<?php

namespace App\Filament\Resources\HomeWhies\Pages;

use App\Filament\Resources\HomeWhies\HomeWhyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeWhy extends CreateRecord
{
    protected static string $resource = HomeWhyResource::class;
    
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}
