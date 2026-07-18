<?php

namespace App\Filament\Resources\ContactSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ContactSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_ar')
                    ->label('عنوان نافذة التواصل')
                    ->placeholder('-'),

                TextColumn::make('form_title_ar')
                    ->label('عنوان النموذج')
                    ->placeholder('-'),

                TextColumn::make('whatsapp_display')
                    ->label('رقم استلام الرسائل')
                    ->placeholder('-'),

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
