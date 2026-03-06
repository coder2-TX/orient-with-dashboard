<?php

namespace App\Filament\Resources\HomePartners\Tables;

use Filament\Tables\Actions\CreateAction;
use Filament\Actions;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomePartnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort', 'asc')
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),

                TextColumn::make('subtitle_ar')
                    ->label('النص (عربي)')
                    ->limit(60)
                    ->wrap(),

                ToggleColumn::make('is_active')
                    ->label('مفعل')
                    ->sortable(),

                TextColumn::make('sort')
                    ->label('ترتيب')
                    ->sortable(),
            ])
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
