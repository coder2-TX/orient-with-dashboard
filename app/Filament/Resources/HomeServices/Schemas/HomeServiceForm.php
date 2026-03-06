<?php

namespace App\Filament\Resources\HomeServices\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Textarea::make('intro.ar')
                ->label('النص تحت العنوان (عربي)')
                ->rows(3)
                ->required(),

            Textarea::make('intro.en')
                ->label('النص تحت العنوان (إنجليزي)')
                ->rows(3)
                ->required(),

            Repeater::make('items')
                ->label('الخدمات')
                ->reorderable()
                ->defaultItems(4)
                ->schema([
                    FileUpload::make('icon')
                        ->label('الأيقونة (SVG/PNG)')
                        ->disk('public')
                        ->directory('home/services/icons')
                        ->visibility('public')
                        ->acceptedFileTypes(['image/svg+xml', 'image/png'])
                        ->image() // يعطي معاينة
                        ->imagePreviewHeight('90')
                        ->panelLayout('grid')
                        ->maxSize(3072) // 3MB
                        ->required(),

                    TextInput::make('title.ar')
                        ->label('العنوان (عربي)')
                        ->required()
                        ->maxLength(120),

                    TextInput::make('title.en')
                        ->label('العنوان (إنجليزي)')
                        ->required()
                        ->maxLength(120),
                ])
                ->minItems(1)
                ->columns(1)
                ->required(),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(false),
        ]);
    }
}
