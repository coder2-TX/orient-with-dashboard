<?php

namespace App\Filament\Resources\AboutMethodologies\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class AboutMethodologiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#'),
                ToggleColumn::make('is_active')->label('مفعل'),
            ])
            ->headerActions([]) //  لا نكرر زر الإضافة داخل الجدول
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
