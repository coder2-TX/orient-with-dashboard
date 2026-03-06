<?php

namespace App\Filament\Resources\HomeFooters\Pages;

use App\Filament\Resources\HomeFooters\HomeFooterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeFooter extends EditRecord
{
    protected static string $resource = HomeFooterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
