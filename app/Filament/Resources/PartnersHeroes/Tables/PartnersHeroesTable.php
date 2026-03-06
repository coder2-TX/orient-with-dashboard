<?php

namespace App\Filament\Resources\PartnersHeroes\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
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
                TextColumn::make('lead_text_ar')
                    ->label('النص (عربي)')
                    ->limit(80)
                    ->wrap(),

                ToggleColumn::make('is_active')->label('مفعل'),
            ])
            //  حتى ما يطلع "إضافة" داخل التابل
            ->headerActions([])
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
