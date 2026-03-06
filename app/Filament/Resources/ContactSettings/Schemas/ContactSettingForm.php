<?php

namespace App\Filament\Resources\ContactSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('whatsapp_display')
                ->label('رقم واتساب')
                ->helperText('اكتب الرقم كما تريد يظهر للزائر مثل: +967 778 080 700')
                ->maxLength(60)
                ->nullable(),

            Toggle::make('is_active')
                ->label('مفعل (يستخدم في الموقع)')
                ->default(true),
        ]);
    }
}
