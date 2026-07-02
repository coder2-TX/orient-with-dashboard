<?php

namespace App\Filament\Resources\HomePartners\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomePartnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort', 'asc')
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('subtitle_ar')
                    ->label('النص المختصر')
                    ->limit(70)
                    ->wrap(),

                TextColumn::make('logos')
                    ->label('عدد الشعارات')
                    ->formatStateUsing(fn ($state): int => is_array($state) ? count(array_filter($state)) : 0),

                ToggleColumn::make('is_active')
                    ->label('اعتماد محتوى الداشبورد')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
