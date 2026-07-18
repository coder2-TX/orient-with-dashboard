<?php

namespace App\Filament\Resources\ContactHeroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactHeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                TextInput::make('title_ar')
                    ->label('عنوان الهيرو - عربي')
                    ->placeholder('نـرحـب بـتـواصـلـكـم')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('title_en')
                    ->label('عنوان الهيرو - إنجليزي')
                    ->placeholder('WE’D LOVE TO HEAR FROM YOU')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('pre_ar')
                    ->label('النص قبل اسم الشركة - عربي')
                    ->placeholder('مـع')
                    ->required()
                    ->maxLength(80)
                    ->columnSpanFull(),

                TextInput::make('pre_en')
                    ->label('النص قبل اسم الشركة - إنجليزي')
                    ->placeholder('WITH')
                    ->required()
                    ->maxLength(80)
                    ->columnSpanFull(),

                TextInput::make('company_ar')
                    ->label('اسم الشركة في الهيرو - عربي')
                    ->placeholder('اوريـنـت يـمـن')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('company_en')
                    ->label('اسم الشركة في الهيرو - إنجليزي')
                    ->placeholder('ORIENT YEMEN')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                FileUpload::make('hero_image')
                    ->label('صورة هيرو تواصل معنا - عربي')
                    ->hint('الحد الأقصى 1MB')
                    ->hintColor('danger')
                    ->image()
                    ->disk('public')
                    ->directory('contact/hero/ar')
                    ->visibility('public')
                    ->panelLayout('grid')
                    ->imagePreviewHeight('160')
                    ->openable()
                    ->downloadable()
                    ->maxSize(1024)
                    ->acceptedFileTypes([
                        'image/svg+xml',
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                    ])
                    ->helperText(
                        'هذه الصورة مخصصة للواجهة العربية. المقاس الموصى به: 1600 × 750 بكسل. يفضّل أن تكون العناصر المهمة في الجهة اليسرى مع ترك مساحة للنص في الجهة اليمنى. إذا تُركت فارغة سيستخدم الموقع الصورة العربية الافتراضية.'
                    )
                    ->columnSpanFull(),

                FileUpload::make('hero_image_en')
                    ->label('صورة هيرو تواصل معنا - إنجليزي')
                    ->hint('الحد الأقصى 1MB')
                    ->hintColor('danger')
                    ->image()
                    ->disk('public')
                    ->directory('contact/hero/en')
                    ->visibility('public')
                    ->panelLayout('grid')
                    ->imagePreviewHeight('160')
                    ->openable()
                    ->downloadable()
                    ->maxSize(1024)
                    ->acceptedFileTypes([
                        'image/svg+xml',
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                    ])
                    ->helperText(
                        'هذه الصورة مخصصة للواجهة الإنجليزية. المقاس الموصى به: 1600 × 750 بكسل. يفضّل أن تكون العناصر المهمة في الجهة اليمنى مع ترك مساحة للنص في الجهة اليسرى. إذا تُركت فارغة سيستخدم الموقع الصورة الإنجليزية الافتراضية.'
                    )
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label(
                        'اعتماد محتوى الداشبورد بدل محتوى اللاندنج الافتراضي'
                    )
                    ->helperText(
                        'عند تفعيل هذا الخيار سيستخدم الموقع النصوص والصورتين العربية والإنجليزية المرفوعة هنا. عند تعطيله سيعود إلى محتوى اللاندنج الافتراضي.'
                    )
                    ->default(true)
                    ->inline(false)
                    ->columnSpanFull(),
            ]);
    }
}
