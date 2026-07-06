<?php

namespace App\Filament\Resources\HomeFooters\Schemas;

use App\Models\HomeFooter;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeFooterForm
{
    public static function configure(Schema $schema): Schema
    {
        $defaults = HomeFooter::defaultData();

        return $schema
            ->schema([
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->default($defaults['email'])
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->default($defaults['phone'])
                    ->maxLength(60)
                    ->required()
                    ->helperText('يظهر في بيانات التواصل، مثال: +967 734888880')
                    ->columnSpanFull(),

                Textarea::make('location_text_ar')
                    ->label('نص رابط الموقع (عربي)')
                    ->default($defaults['location_text_ar'])
                    ->rows(2)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('location_text_en')
                    ->label('Location link text (English)')
                    ->default($defaults['location_text_en'])
                    ->rows(2)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('location_url')
                    ->label('رابط الموقع على Google Maps')
                    ->url()
                    ->default($defaults['location_url'])
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
                    ->default($defaults['locations'])
                    ->addActionLabel('إضافة موقع')
                    ->reorderable()
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('facebook_url')
                    ->label('رابط Facebook')
                    ->url()
                    ->default($defaults['facebook_url'])
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('instagram_url')
                    ->label('رابط Instagram')
                    ->url()
                    ->default($defaults['instagram_url'])
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('x_url')
                    ->label('رابط X')
                    ->url()
                    ->default($defaults['x_url'])
                    ->maxLength(255)
                    ->nullable()
                    ->columnSpanFull(),

                TextInput::make('whatsapp_url')
                    ->label('رابط WhatsApp')
                    ->helperText('مثال: https://wa.me/9677xxxxxxx أو رابط واتساب كامل')
                    ->url()
                    ->default($defaults['whatsapp_url'])
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