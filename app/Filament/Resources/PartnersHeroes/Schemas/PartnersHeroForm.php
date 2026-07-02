<?php

namespace App\Filament\Resources\PartnersHeroes\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PartnersHeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('محتوى هيرو الشركاء')
                    ->description('هذا المحتوى يظهر في أعلى صفحة شركائنا. عند إلغاء الاعتماد سيستخدم الموقع المحتوى الافتراضي الموجود في الكود.')
                    ->schema([
                        TextInput::make('title_text_ar')
                            ->label('عنوان السكشن (عربي)')
                            ->maxLength(120)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('title_text_en')
                            ->label('Section title (English)')
                            ->maxLength(120)
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('lead_text_ar')
                            ->label('النص تحت العنوان (عربي)')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('lead_text_en')
                            ->label('Text under title (English)')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                            ->helperText('عند إيقاف هذا الخيار سيعرض الموقع النص الافتراضي الآمن.')
                            ->default(true)
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
