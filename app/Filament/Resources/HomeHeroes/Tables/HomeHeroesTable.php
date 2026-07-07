<?php

namespace App\Filament\Resources\HomeHeroes\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeHeroesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('experience_years')
                    ->label('سنوات الخبرة')
                    ->sortable(),

                TextColumn::make('slides_count')
                    ->label('عدد الصور')
                    ->state(fn ($record): int => is_array($record->slides) ? count($record->slides) : 0)
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
