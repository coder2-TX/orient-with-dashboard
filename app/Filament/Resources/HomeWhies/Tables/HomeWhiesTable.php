<?php

namespace App\Filament\Resources\HomeWhies\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeWhiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),

                TextColumn::make('sort_order')->label('الترتيب')->sortable(),

                TextColumn::make('text_ar')
                    ->label('النص عربي')
                    ->limit(50)
                    ->wrap(),

                ToggleColumn::make('is_active')->label('مفعل')->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()->label('تعديل'),
                    DeleteAction::make()->label('حذف'),
                ]),
            ]);
    }
}
