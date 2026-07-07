<?php

namespace App\Filament\Resources\HomeServices\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('intro.ar')
                    ->label('نص المقدمة')
                    ->limit(70)
                    ->wrap(),

                TextColumn::make('items_count')
                    ->label('عدد الخدمات')
                    ->state(fn ($record): int => is_array($record->items) ? count($record->items) : 0)
                    ->alignCenter(),

                ToggleColumn::make('is_active')
                    ->label('اعتماد محتوى الداشبورد')
                    ->sortable(),
            ])
            ->defaultSort('id', 'asc')
            ->paginated(false)
            ->recordActions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
