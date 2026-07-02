<?php

namespace App\Filament\Resources\HomeHeroes\Pages;

use App\Filament\Resources\HomeHeroes\HomeHeroResource;
use App\Models\HomeHero;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListHomeHeroes extends ListRecords
{
    protected static string $resource = HomeHeroResource::class;

    public function mount(): void
    {
        HomeHero::firstOrCreateDefault();

        parent::mount();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('editDefaultHero')
                ->label('تعديل محتوى السلايدر')
                ->icon('heroicon-o-pencil-square')
                ->url(fn (): string => $this->getResource()::getUrl('edit', [
                    'record' => HomeHero::firstOrCreateDefault(),
                ])),
        ];
    }
}
