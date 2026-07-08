<?php

namespace App\Filament\Resources\ProductPageProducts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class ProductPageProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                TextInput::make('sort_order')
                    ->label('ترتيب المنتج')
                    ->numeric()
                    ->minValue(1)
                    ->required()
                    ->helperText('يتم عرض المنتجات في الموقع حسب هذا الترتيب.')
                    ->columnSpanFull(),

                TextInput::make('title_ar')
                    ->label('اسم المنتج (عربي)')
                    ->required()
                    ->maxLength(160)
                    ->columnSpanFull(),

                TextInput::make('title_en')
                    ->label('Product Name (English)')
                    ->required()
                    ->maxLength(160)
                    ->columnSpanFull(),

                Textarea::make('desc_ar')
                    ->label('وصف المنتج (عربي)')
                    ->rows(4)
                    ->required()
                    ->maxLength(700)
                    ->columnSpanFull(),

                Textarea::make('desc_en')
                    ->label('Product Description (English)')
                    ->rows(4)
                    ->required()
                    ->maxLength(700)
                    ->columnSpanFull(),

                Placeholder::make('default_image_preview')
                    ->label('الصورة الافتراضية')
                    ->content(function ($record): HtmlString {
                        if (! $record || blank($record->default_image)) {
                            return new HtmlString(
                                '<span style="font-size:13px;color:#6b7280;">لا توجد صورة افتراضية لهذا المنتج. يجب رفع صورة للمنتج.</span>'
                            );
                        }

                        $imageUrl = asset($record->default_image);

                        return new HtmlString(
                            '<div style="display:flex;flex-direction:column;gap:10px;padding:12px;border:1px solid #e5e7eb;border-radius:14px;background:#fafafa;">'
                            . '<img src="' . e($imageUrl) . '" alt="Default Product Image" style="width:180px;height:180px;object-fit:cover;object-position:center top;border-radius:12px;border:1px solid #e5e7eb;background:#fff;">'
                            . '<span style="font-size:13px;color:#6b7280;">إذا لم يتم رفع صورة مخصصة، سيستخدم الموقع هذه الصورة الافتراضية.</span>'
                            . '</div>'
                        );
                    })
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('صورة المنتج')
                    ->hint('الحد الأقصى 1MB لكل صورة')
                    ->hintColor('danger')
                    ->image()
                    ->disk('public')
                    ->directory('products/page')
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
                    ->helperText('المقاس الموصى به لصورة المنتج: 800 × 800 بكسل. الحد الأقصى 1MB والصيغ المسموحة: SVG / PNG / JPG / WEBP. يفضّل استخدام WEBP أو JPG ووضع المنتج في منتصف الصورة لأن الصورة قد تُقص تلقائيًا حسب حجم الكرت.')
                    ->required(fn ($record): bool => blank($record?->default_image))
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('إظهار هذا المنتج في الموقع')
                    ->helperText('عند إيقاف المنتج لن يظهر في صفحة المنتجات.')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }
}