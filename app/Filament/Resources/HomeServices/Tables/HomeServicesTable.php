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

                TextColumn::make('items')
                    ->label('عدد الخدمات')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0),

                ToggleColumn::make('is_active')
                    ->label('اعتماد محتوى الداشبورد')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->defaultSort('id', 'asc')
            ->recordActions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
