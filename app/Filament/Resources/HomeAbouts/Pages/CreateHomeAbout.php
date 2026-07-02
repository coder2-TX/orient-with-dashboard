<?php

namespace App\Filament\Resources\HomeAbouts\Pages;

use App\Filament\Resources\HomeAbouts\HomeAboutResource;
use App\Models\HomeAbout;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeAbout extends CreateRecord
{
    protected static string $resource = HomeAboutResource::class;

    public function mount(): void
    {
        $record = HomeAbout::firstOrCreateDefault();

        $this->redirect(HomeAboutResource::getUrl('edit', ['record' => $record]));
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
