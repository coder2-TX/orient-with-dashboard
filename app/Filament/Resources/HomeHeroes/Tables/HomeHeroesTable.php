<?php

namespace App\Filament\Resources\HomeHeroes\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeHeroesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('title.ar')
                    ->label('العنوان (عربي)'),

                TextColumn::make('experience_years')
                    ->label('سنوات الخبرة')
                    ->sortable(),

                TextColumn::make('slides')
                    ->label('عدد الصور')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0),

                ToggleColumn::make('is_active')
                    ->label('مفعل')
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
