<?php

namespace App\Filament\Resources\HomeHeroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeHeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                TextInput::make('title.ar')
                    ->label('عنوان السلايدر - عربي')
                    ->placeholder('اوريـنـت يـمـن')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title.en')
                    ->label('عنوان السلايدر - إنجليزي')
                    ->placeholder('ORIENT YEMEN')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('third_line.ar')
                    ->label('السطر الثالث - عربي')
                    ->placeholder('وشـراكـات تـبـنـي الـمـسـتـقـبـل')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('third_line.en')
                    ->label('السطر الثالث - إنجليزي')
                    ->placeholder('Partnerships that shape the future')
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('experience_years')
                    ->label('سنوات الخبرة')
                    ->numeric()
                    ->minValue(0)
                    ->nullable()
                    ->helperText('إذا تُرك الحقل فارغًا سيستخدم الموقع الرقم الافتراضي 15.')
                    ->columnSpanFull(),

                FileUpload::make('slides')
                    ->label('صور السلايدر')
                    ->hint('الحد الأقصى 1MB لكل صورة')
                    ->hintColor('danger')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->disk('public')
                    ->directory('home/hero')
                    ->visibility('public')
                    ->panelLayout('grid')
                    ->imagePreviewHeight('160')
                    ->openable()
                    ->downloadable()
                    ->maxSize(1024)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->helperText('يمكن ترتيب الصور بالسحب. الحد الأقصى 1MB لكل صورة والصيغ المسموحة: SVG / PNG / JPG / WEBP.')
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('اعتماد محتوى الداشبورد بدل محتوى اللاندنج الافتراضي')
                    ->helperText('عند تفعيل هذا الخيار سيستخدم الموقع هذه البيانات والصور. عند تعطيله سيعود الموقع إلى محتوى اللاندنج الافتراضي.')
                    ->default(false)
                    ->inline(false)
                    ->columnSpanFull(),
            ]);
    }
}
