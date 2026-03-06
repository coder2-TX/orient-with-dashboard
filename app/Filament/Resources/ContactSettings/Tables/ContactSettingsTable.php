<?php

namespace App\Filament\Resources\ContactSettings\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ContactSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('whatsapp_display')->label('WhatsApp (عرض)')->placeholder('-'),
                ToggleColumn::make('is_active')->label('مفعل'),
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
