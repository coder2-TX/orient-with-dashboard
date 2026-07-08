<?php

namespace App\Filament\Resources\ProductPageProducts\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ProductPageProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->extraAttributes([
                'class' => 'oy-product-page-products-table',
            ])
            ->columns([
                TextColumn::make('sort_order')
                    ->label('الترتيب')
                    ->sortable()
                    ->alignCenter(),

                ImageColumn::make('preview_image')
                    ->label('الصورة')
                    ->getStateUsing(fn ($record): string => $record->landingImageUrl())
                    ->height(64)
                    ->width(64),

                TextColumn::make('title_ar')
                    ->label('الاسم العربي')
                    ->searchable()
                    ->sortable()
                    ->limit(35),

                TextColumn::make('title_en')
                    ->label('الاسم الإنجليزي')
                    ->searchable()
                    ->sortable()
                    ->limit(35),

                TextColumn::make('desc_ar')
                    ->label('الوصف العربي')
                    ->searchable()
                    ->limit(70)
                    ->wrap(),

                ToggleColumn::make('is_active')
                    ->label('الظهور في الموقع')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->searchPlaceholder('بحث باسم المنتج أو الوصف...')
            ->paginated([10, 25, 50])
            ->defaultPaginationPageOption(10)
            ->recordActions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),

                DeleteAction::make()
                    ->label('حذف')
                    ->icon('heroicon-o-trash')
                    ->visible(fn ($record): bool => blank($record->default_key)),
            ]);
    }
}