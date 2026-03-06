<?php

namespace App\Filament\Resources\HomeServices\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),

                TextColumn::make('intro.ar')
                    ->label('النص (عربي)')
                    ->limit(50),

                TextColumn::make('items')
                    ->label('عدد الخدمات')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0),

                ToggleColumn::make('is_active')
                    ->label('مفعل')
                    ->sortable(),

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
