<?php

namespace App\Filament\Resources\ProductPageProducts\Pages;

use App\Filament\Resources\ProductPageProducts\ProductPageProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductPageProduct extends CreateRecord
{
    protected static string $resource = ProductPageProductResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}