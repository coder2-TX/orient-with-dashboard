<?php

namespace App\Filament\Resources\PartnersHeroes\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PartnersHeroesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_text_ar')
                    ->label('العنوان')
                    ->placeholder('شركاؤنا')
                    ->sortable(),

                TextColumn::make('lead_text_ar')
                    ->label('النص (عربي)')
                    ->limit(80)
                    ->wrap(),

                ToggleColumn::make('is_active')
                    ->label('اعتماد محتوى الداشبورد')
                    ->sortable(),
            ])
            ->defaultSort('id', 'asc')
            ->paginated(false)
            ->headerActions([])
            ->actions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
