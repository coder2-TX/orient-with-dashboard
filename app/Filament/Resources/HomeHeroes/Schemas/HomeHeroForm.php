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
                    ->placeholder(
                        'وشـراكـات تـبـنـي الـمـسـتـقـبـل'
                    )
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('third_line.en')
                    ->label('السطر الثالث - إنجليزي')
                    ->placeholder(
                        'Partnerships that shape the future'
                    )
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('experience_years')
                    ->label('سنوات الخبرة')
                    ->numeric()
                    ->minValue(0)
                    ->nullable()
                    ->helperText(
                        'إذا تُرك الحقل فارغًا سيستخدم الموقع الرقم الافتراضي 15.'
                    )
                    ->columnSpanFull(),

                FileUpload::make('slides')
                    ->label('صور السلايدر - عربي')
                    ->hint('الحد الأقصى 1MB لكل صورة')
                    ->hintColor('danger')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->disk('public')
                    ->directory('home/hero/ar')
                    ->visibility('public')
                    ->panelLayout('grid')
                    ->imagePreviewHeight('160')
                    ->openable()
                    ->downloadable()
                    ->maxSize(1024)
                    ->acceptedFileTypes([
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                    ])
                    ->helperText(
                        'هذه الصور مخصصة للواجهة العربية. المقاس الموصى به: 1600 × 750 بكسل. يفضّل أن يكون المنتج في الجهة اليسرى مع ترك مساحة فارغة للنص في الجهة اليمنى. يمكن ترتيب الصور بالسحب.'
                    )
                    ->columnSpanFull(),

                FileUpload::make('slides_en')
                    ->label('صور السلايدر - إنجليزي')
                    ->hint('الحد الأقصى 1MB لكل صورة')
                    ->hintColor('danger')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->disk('public')
                    ->directory('home/hero/en')
                    ->visibility('public')
                    ->panelLayout('grid')
                    ->imagePreviewHeight('160')
                    ->openable()
                    ->downloadable()
                    ->maxSize(1024)
                    ->acceptedFileTypes([
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                    ])
                    ->helperText(
                        'هذه الصور مخصصة للواجهة الإنجليزية. المقاس الموصى به: 1600 × 750 بكسل. يفضّل أن يكون المنتج في الجهة اليمنى مع ترك مساحة فارغة للنص في الجهة اليسرى. يمكن ترتيب الصور بالسحب.'
                    )
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label(
                        'اعتماد محتوى الداشبورد بدل محتوى اللاندنج الافتراضي'
                    )
                    ->helperText(
                        'عند تفعيل هذا الخيار سيستخدم الموقع النصوص والصور العربية والإنجليزية المرفوعة هنا. عند تعطيله سيعود إلى محتوى اللاندنج الافتراضي.'
                    )
                    ->default(false)
                    ->inline(false)
                    ->columnSpanFull(),
            ]);
    }
}