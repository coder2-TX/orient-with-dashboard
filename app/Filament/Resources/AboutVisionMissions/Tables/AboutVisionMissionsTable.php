<?php

namespace App\Filament\Resources\AboutVisionMissions\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class AboutVisionMissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section_title_ar')
                    ->label('عنوان السكشن')
                    ->placeholder('رؤيتنا ورسالتنا')
                    ->sortable(),

                TextColumn::make('intro_text_ar')
                    ->label('النص التعريفي')
                    ->limit(70)
                    ->wrap(),

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
