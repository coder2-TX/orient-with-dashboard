<?php

namespace App\Filament\Resources\ContactHeroes\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ContactHeroesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('title_ar')
                    ->label('عنوان الهيرو')
                    ->searchable()
                    ->limit(50),

                ImageColumn::make('hero_image')
                    ->label('صورة العربي')
                    ->disk('public')
                    ->height(48)
                    ->width(80),

                ImageColumn::make('hero_image_en')
                    ->label('صورة الإنجليزي')
                    ->disk('public')
                    ->height(48)
                    ->width(80),

                ToggleColumn::make('is_active')
                    ->label('اعتماد محتوى الداشبورد')
                    ->sortable(),
            ])
            ->defaultSort('id', 'asc')
            ->paginated(false)
            ->recordActions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}
