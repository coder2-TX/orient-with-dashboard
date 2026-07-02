<?php

namespace App\Filament\Resources\HomePartners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomePartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Textarea::make('subtitle_ar')
                    ->label('النص تحت العنوان (عربي)')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('subtitle_en')
                    ->label('النص تحت العنوان (إنجليزي)')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('logos')
                    ->label('شعارات الشركاء')
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->disk('public')
                    ->directory('home/partners')
                    ->visibility('public')
                    ->panelLayout('grid')
                    ->imagePreviewHeight('90')
                    ->openable()
                    ->downloadable()
                    ->acceptedFileTypes([
                        'image/svg+xml',
                        'image/png',
                        'image/jpeg',
                        'image/webp',
                    ])
                    ->maxSize(1024)
                    ->helperText('يمكن ترتيب الشعارات بالسحب. الحد الأقصى 1MB لكل شعار، والصيغ المسموحة: SVG / PNG / JPG / WEBP.')
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                    ->helperText('عند الإيقاف سيعرض الموقع المحتوى الافتراضي الموجود في اللاندنج.')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }
}
