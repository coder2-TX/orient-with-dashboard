<?php

namespace App\Filament\Resources\AboutValues\Schemas;

use App\Models\AboutValue;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AboutValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title_text_ar')
                    ->label('عنوان السكشن (عربي)')
                    ->default(AboutValue::DEFAULT_TITLE_AR)
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('title_text_en')
                    ->label('Section title (English)')
                    ->default(AboutValue::DEFAULT_TITLE_EN)
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('intro_text_ar')
                    ->label('نص قيمنا (عربي)')
                    ->default(AboutValue::DEFAULT_INTRO_AR)
                    ->rows(3)
                    ->nullable()
                    ->columnSpanFull(),

                Textarea::make('intro_text_en')
                    ->label('Our Values text (English)')
                    ->default(AboutValue::DEFAULT_INTRO_EN)
                    ->rows(3)
                    ->nullable()
                    ->columnSpanFull(),

                Repeater::make('items')
                    ->label('عناصر القيم')
                    ->helperText('العدد الطبيعي 5 قيم. يمكن إضافة قيمة سادسة فقط، ولا يمكن تقليل العدد عن 5 أو تجاوز 6.')
                    ->minItems(5)
                    ->maxItems(6)
                    ->default(AboutValue::defaultItems())
                    ->reorderable()
                    ->addActionLabel('إضافة قيمة سادسة')
                    ->columns(1)
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
                            ->maxSize(1024)
                            ->image()
                            ->imagePreviewHeight('80')
                            ->panelLayout('grid')
                            ->openable()
                            ->downloadable()
                            ->helperText('الحد الأقصى 1MB لكل أيقونة.')
                            ->nullable()
                            ->columnSpanFull(),

                        TextInput::make('title_ar')
                            ->label('العنوان (عربي)')
                            ->required()
                            ->maxLength(80)
                            ->columnSpanFull(),

                        TextInput::make('desc_ar')
                            ->label('الوصف (عربي)')
                            ->required()
                            ->maxLength(140)
                            ->columnSpanFull(),

                        TextInput::make('title_en')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(80)
                            ->columnSpanFull(),

                        TextInput::make('desc_en')
                            ->label('Description (English)')
                            ->required()
                            ->maxLength(140)
                            ->columnSpanFull(),
                    ])
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }
}
