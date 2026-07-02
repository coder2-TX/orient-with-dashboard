<?php

namespace App\Filament\Resources\HomeWhies\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeWhiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort_order')
                    ->label('الترتيب')
                    ->sortable(),

                TextColumn::make('text_ar')
                    ->label('النص العربي')
                    ->limit(70)
                    ->wrap(),

                TextColumn::make('text_en')
                    ->label('النص الإنجليزي')
                    ->limit(70)
                    ->wrap(),

                ToggleColumn::make('is_active')
                    ->label('الظهور في الموقع')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->recordActions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
