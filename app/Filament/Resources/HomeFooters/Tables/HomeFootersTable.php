<?php

namespace App\Filament\Resources\HomeFooters\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeFootersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('رقم الهاتف')
                    ->searchable(),

                TextColumn::make('locations_count')
                    ->label('عدد المواقع')
                    ->state(fn ($record): int => is_array($record->locations) ? count($record->locations) : 0)
                    ->alignCenter(),

                ToggleColumn::make('is_active')
                    ->label('اعتماد محتوى الداشبورد')
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
