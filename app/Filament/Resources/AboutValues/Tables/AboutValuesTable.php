<?php

namespace App\Filament\Resources\AboutValues\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
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
                TextColumn::make('intro_text_ar')
                    ->label('النص (عربي)')
                    ->limit(60),

                ToggleColumn::make('is_active')
                    ->label('مفعل'),
            ])
            ->headerActions([]) //  (ما نكرر زر الإضافة)
            ->actions([
                ActionGroup::make([
                    EditAction::make()->label('تعديل'),
                    DeleteAction::make()->label('حذف'),
                ])
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->iconButton(),
            ]);
    }
}
