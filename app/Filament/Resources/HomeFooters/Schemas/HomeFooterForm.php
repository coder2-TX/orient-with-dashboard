<?php

namespace App\Filament\Resources\HomeFooters\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeFooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('email')
                ->label('البريد الإلكتروني')
                ->email()
                ->maxLength(190)
                ->nullable(),

            TextInput::make('phone')
                ->label('رقم الهاتف')
                ->tel()
                ->maxLength(60)
                ->nullable(),

            Textarea::make('location_text_ar')
                ->label('الموقع (عربي)')
                ->rows(2)
                ->nullable(),

            Textarea::make('location_text_en')
                ->label('Location (English)')
                ->rows(2)
                ->nullable(),

            TextInput::make('location_url')
                ->label('رابط اللوكيشن (Google Maps)')
                ->url()
                ->maxLength(255)
                ->nullable(),

            Repeater::make('locations')
                ->label('مواقعنا (قائمة الدول)')
                ->schema([
                    TextInput::make('name_ar')
                        ->label('الدولة (عربي)')
                        ->maxLength(120)
                        ->required(),
                    TextInput::make('name_en')
                        ->label('Country (English)')
                        ->maxLength(120)
                        ->required(),
                ])
                ->columns(2)
                ->addActionLabel('إضافة دولة')
                ->reorderable()
                ->defaultItems(0)
                ->nullable(),

            TextInput::make('x_url')
                ->label('رابط X')
                ->url()
                ->maxLength(255)
                ->nullable(),

            TextInput::make('facebook_url')
                ->label('رابط Facebook')
                ->url()
                ->maxLength(255)
                ->nullable(),

            TextInput::make('whatsapp_url')
                ->label('رابط WhatsApp')
                ->helperText('مثال: https://wa.me/9677xxxxxxx أو رابط واتساب كامل')
                ->url()
                ->maxLength(255)
                ->nullable(),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(true),
        ]);
    }
}
