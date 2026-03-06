<?php

namespace App\Filament\Resources\PartnersTrusts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PartnersTrustForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Repeater::make('items')
                ->label('كروت ثقة شركائنا (حد أقصى 5)')
                ->maxItems(5)
                ->defaultItems(0)
                ->reorderable()
                ->addActionLabel('إضافة كرت')
                ->columns(2)
                ->schema([
                    FileUpload::make('icon')
                        ->label('الأيقونة (SVG/PNG)')
                        ->disk('public')
                        ->directory('partners/trust/icons')
                        ->visibility('public')
                        ->acceptedFileTypes([
                            'image/svg+xml',
                            'image/png',
                            'image/jpeg',
                            'image/webp',
                        ])
                        ->maxSize(2048)
                        ->nullable(),

                    TextInput::make('title_ar')
                        ->label('العنوان (عربي)')
                        ->required()
                        ->maxLength(80),

                    TextInput::make('desc_ar')
                        ->label('الوصف (عربي)')
                        ->required()
                        ->maxLength(140),

                    TextInput::make('title_en')
                        ->label('Title (English)')
                        ->required()
                        ->maxLength(80),

                    TextInput::make('desc_en')
                        ->label('Description (English)')
                        ->required()
                        ->maxLength(140),
                ]),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(true),
        ]);
    }
}
