<?php

namespace App\Filament\Resources\HomeFooters\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeFooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->maxLength(60)
                    ->required()
                    ->helperText('يظهر في بيانات التواصل، مثال: +967 734888880')
                    ->columnSpanFull(),

                Textarea::make('location_text_ar')
                    ->label('نص رابط الموقع (عربي)')
                    ->rows(2)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('location_text_en')
                    ->label('Location link text (English)')
                    ->rows(2)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('location_url')
                    ->label('رابط الموقع على Google Maps')
                    ->url()
                    ->maxLength(255)
                    ->required()
                    ->columnSpanFull(),

                Repeater::make('locations')
                    ->label('مواقعنا / الدول')
                    ->schema([
                        TextInput::make('name_ar')
                            ->label('اسم الموقع (عربي)')
                            ->maxLength(120)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('name_en')
                            ->label('Location name (English)')
                            ->maxLength(120)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->minItems(1)
                    ->defaultItems(3)
                    ->addActionLabel('إضافة موقع')
                    ->reorderable()
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('facebook_url')
                    ->label('رابط Facebook')
                    ->url()
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('instagram_url')
                    ->label('رابط Instagram')
                    ->url()
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('x_url')
                    ->label('رابط X')
                    ->url()
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('whatsapp_url')
                    ->label('رابط WhatsApp')
                    ->helperText('مثال: https://wa.me/9677xxxxxxx أو رابط واتساب كامل')
                    ->url()
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                    ->default(true)
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
