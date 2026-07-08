<?php

namespace App\Filament\Resources\AboutOrientYemens\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class AboutOrientYemensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('title_ar')
                    ->label('العنوان')
                    ->limit(40),

                TextColumn::make('branches_count')
                    ->label('عدد الفروع')
                    ->state(fn ($record): int => is_array($record->branches) ? count($record->branches) : 0)
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