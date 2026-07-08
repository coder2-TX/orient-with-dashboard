<?php

namespace App\Filament\Resources\ContactHeroes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

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

                Placeholder::make('default_hero_image_preview')
                    ->label('الصورة الافتراضية')
                    ->content(function (): HtmlString {
                        $imageUrl = asset('assets/images/main/hero/1.png');

                        return new HtmlString(
                            '<div style="display:flex;flex-direction:column;gap:10px;padding:12px;border:1px solid #e5e7eb;border-radius:14px;background:#fafafa;">'
                            . '<img src="' . e($imageUrl) . '" alt="Default Contact Hero Image" style="width:100%;max-width:420px;height:180px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb;">'
                            . '<span style="font-size:13px;color:#6b7280;">هذه هي الصورة الافتراضية التي سيستخدمها الموقع إذا لم يتم رفع صورة مخصصة.</span>'
                            . '</div>'
                        );
                    })
                    ->columnSpanFull(),

                FileUpload::make('hero_image')
                    ->label('صورة هيرو تواصل معنا')
                    ->hint('الحد الأقصى 1MB لكل صورة')
                    ->hintColor('danger')
                    ->image()
                    ->disk('public')
                    ->directory('contact/hero')
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
                    ->helperText('إذا تُرك الحقل فارغًا سيستخدم الموقع صورة اللاندنج الافتراضية. الحد الأقصى 1MB والصيغ المسموحة: SVG / PNG / JPG / WEBP.')
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('اعتماد محتوى الداشبورد بدل محتوى اللاندنج الافتراضي')
                    ->helperText('عند تفعيل هذا الخيار سيستخدم الموقع هذه البيانات والصورة. عند تعطيله سيعود الموقع إلى محتوى اللاندنج الافتراضي.')
                    ->default(true)
                    ->inline(false)
                    ->columnSpanFull(),
            ]);
    }
}