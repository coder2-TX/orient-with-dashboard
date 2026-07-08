<?php

namespace App\Filament\Resources\ProductPageProducts\Pages;

use App\Filament\Resources\ProductPageProducts\ProductPageProductResource;
use App\Models\ProductPageProduct;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductPageProducts extends ListRecords
{
    protected static string $resource = ProductPageProductResource::class;

    public function mount(): void
    {
        parent::mount();

        ProductPageProduct::ensureDefaultRows();
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة منتج')
                ->icon('heroicon-o-plus'),
        ];
    }
}