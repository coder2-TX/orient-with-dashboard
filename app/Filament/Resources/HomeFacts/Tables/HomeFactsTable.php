<?php

namespace App\Filament\Resources\HomeFacts\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeFactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),

                TextColumn::make('team_count')->label('كادر')->sortable(),
                TextColumn::make('vehicles_count')->label('مركبات')->sortable(),
                TextColumn::make('warehouses_count')->label('مستودعات')->sortable(),
                TextColumn::make('pos_count')->label('نقاط بيع')->sortable(),

                ToggleColumn::make('is_active')->label('مفعل')->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc')
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()->label('تعديل'),
                    DeleteAction::make()->label('حذف'),
                ]),
            ]);
    }
}
