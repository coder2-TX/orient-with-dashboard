<?php

namespace App\Filament\Resources\HomeAbouts\Schemas;

use App\Models\HomeAbout;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeAboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Section::make('محتوى سكشن عن أورينت يمن')
                    ->description('هذا هو المحتوى الذي سيظهر في سكشن عن الشركة عند اعتماد محتوى الداشبورد. عند عدم الاعتماد سيستخدم الموقع المحتوى الافتراضي.')
                    ->columnSpanFull()
                    ->columns(1)
                    ->schema([
                        Textarea::make('body.ar')
                            ->label('النص العربي')
                            ->default(HomeAbout::DEFAULT_BODY_AR)
                            ->rows(8)
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('body.en')
                            ->label('النص الإنجليزي')
                            ->default(HomeAbout::DEFAULT_BODY_EN)
                            ->rows(8)
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('حالة عرض المحتوى')
                    ->description('فعّل هذا الخيار فقط عندما تريد اعتماد النص الموجود في الداشبورد بدل النص الافتراضي في اللاندنج.')
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                            ->default(false),
                    ]),
            ]);
    }
}
