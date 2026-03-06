<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;


class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('البريد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')

            //  لا نريد "إضافة"
            ->headerActions([])

            //  فقط عرض + تعديل
            ->actions([
                ViewAction::make()
                    ->label('عرض'),

                EditAction::make()
                    ->label('تعديل'),
            ])

            //  لا نريد bulk actions
            ->bulkActions([]);
    }
}
