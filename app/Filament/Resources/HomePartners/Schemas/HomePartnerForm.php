<?php

namespace App\Filament\Resources\HomePartners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomePartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Textarea::make('subtitle_ar')
                ->label('النص تحت العنوان (عربي)')
                ->rows(4)
                ->nullable(),

            Textarea::make('subtitle_en')
                ->label('النص تحت العنوان (إنجليزي)')
                ->rows(4)
                ->nullable(),

            FileUpload::make('logos')
                ->label('شعارات الشركاء (غير محدودة)')
                ->multiple()
                ->reorderable()
                ->appendFiles()
                ->disk('public')
                ->directory('home/partners')
                ->visibility('public')
                ->panelLayout('grid')
                ->imagePreviewHeight('80')
                ->openable()
                ->downloadable()
                ->acceptedFileTypes([
                    'image/svg+xml',
                    'image/png',
                    'image/jpeg',
                    'image/webp',
                ])
                ->maxSize(3072) // 3MB لكل شعار
                ->helperText('ارفع أي عدد من الشعارات (SVG/PNG/JPG/WEBP). الحد الأقصى 3MB لكل ملف.'),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(false),
        ]);
    }
}
