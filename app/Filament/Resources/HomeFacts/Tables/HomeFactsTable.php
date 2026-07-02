<?php

namespace App\Filament\Resources\HomeFacts\Tables;

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
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('team_count')
                    ->label('كادر بشري متخصص')
                    ->sortable(),

                TextColumn::make('vehicles_count')
                    ->label('مركبات توزيع حديثة')
                    ->sortable(),

                TextColumn::make('warehouses_count')
                    ->label('مستودعات مركزية')
                    ->sortable(),

                TextColumn::make('pos_count')
                    ->label('نقاط بيع معتمدة')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('اعتماد محتوى الداشبورد')
                    ->sortable(),
            ])
            ->defaultSort('id', 'asc')
            ->recordActions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
