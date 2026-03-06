<?php

namespace App\Filament\Resources\PartnersTrusts\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PartnersTrustsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->searchable(false)
            ->columns([
                TextColumn::make('items')
                    ->label('عدد الكروت')
                    ->state(fn ($record) => is_array($record->items) ? count($record->items) : 0),

                ToggleColumn::make('is_active')->label('مفعل'),
                TextColumn::make('updated_at')->label('آخر تحديث')->since(),
            ])
            ->headerActions([])
            ->actions([
                ActionGroup::make([
                    EditAction::make()->label('تعديل'),
                    DeleteAction::make()->label('حذف'),
                ])->icon('heroicon-m-ellipsis-vertical')->iconButton(),
            ]);
    }
}
