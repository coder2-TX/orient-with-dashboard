<?php

namespace App\Filament\Resources\HomeWhies\Pages;

use App\Filament\Resources\HomeWhies\HomeWhyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeWhy extends EditRecord
{
    protected static string $resource = HomeWhyResource::class;

   protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

}
