<?php

namespace App\Filament\Resources\AboutValues\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AboutValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('intro_text_ar')
                ->label('نص قيمنا (عربي)')
                ->maxLength(190)
                ->nullable(),

            TextInput::make('intro_text_en')
                ->label('Our Values text (English)')
                ->maxLength(190)
                ->nullable(),

            Repeater::make('items')
                ->label('عناصر القيم (حد أقصى 6)')
                ->maxItems(6)
                ->defaultItems(0)
                ->reorderable()
                ->addActionLabel('إضافة قيمة')
                ->columns(2)
                ->schema([
                    FileUpload::make('icon')
                        ->label('الأيقونة (SVG/PNG/JPG/WEBP)')
                        ->disk('public')
                        ->directory('about/values/icons')
                        ->visibility('public')
                        ->acceptedFileTypes([
                            'image/svg+xml',
                            'image/png',
                            'image/jpeg',
                            'image/webp',
                        ])
                        ->maxSize(2048) // 2MB
                        ->image()
                        ->imagePreviewHeight('60')
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
