<?php

namespace App\Filament\Resources\AboutValues\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class AboutValuesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_text_ar')
                    ->label('عنوان السكشن')
                    ->placeholder('قيمنا')
                    ->sortable(),

                TextColumn::make('intro_text_ar')
                    ->label('النص (عربي)')
                    ->limit(60)
                    ->wrap(),

                TextColumn::make('items')
                    ->label('عدد القيم')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0),

                ToggleColumn::make('is_active')
                    ->label('اعتماد محتوى الداشبورد')
                    ->sortable(),
            ])
            ->defaultSort('id', 'asc')
            ->headerActions([])
            ->actions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
