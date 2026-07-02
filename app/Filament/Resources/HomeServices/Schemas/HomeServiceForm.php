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
        return $schema
            ->columns(1)
            ->schema([
                Textarea::make('intro.ar')
                    ->label('النص تحت العنوان (عربي)')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('intro.en')
                    ->label('النص تحت العنوان (إنجليزي)')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),

                Repeater::make('items')
                    ->label('الخدمات')
                    ->reorderable()
                    ->defaultItems(4)
                    ->schema([
                        FileUpload::make('icon')
                            ->label('أيقونة الخدمة')
                            ->disk('public')
                            ->directory('home/services/icons')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/jpeg', 'image/webp'])
                            ->image()
                            ->imagePreviewHeight('90')
                            ->panelLayout('grid')
                            ->openable()
                            ->downloadable()
                            ->maxSize(1024)
                            ->helperText('الحد الأقصى 1MB. الصيغ المسموحة: SVG, PNG, JPG, WEBP.')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('title.ar')
                            ->label('اسم الخدمة (عربي)')
                            ->required()
                            ->maxLength(120)
                            ->columnSpanFull(),

                        TextInput::make('title.en')
                            ->label('اسم الخدمة (إنجليزي)')
                            ->required()
                            ->maxLength(120)
                            ->columnSpanFull(),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['title']['ar'] ?? $state['title']['en'] ?? 'خدمة')
                    ->minItems(1)
                    ->columns(1)
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                    ->helperText('عند تفعيل هذا الخيار سيظهر محتوى الداشبورد في الموقع، وعند إيقافه سيبقى محتوى اللاندنج الافتراضي.')
                    ->default(false)
                    ->inline(false)
                    ->columnSpanFull(),
            ]);
    }
}
