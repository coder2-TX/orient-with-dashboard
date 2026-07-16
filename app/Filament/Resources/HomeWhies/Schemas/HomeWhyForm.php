<?php

namespace App\Filament\Resources\HomeWhies\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeWhyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Textarea::make('text_ar')
                    ->label('نص الكرت (عربي)')
                    ->rows(4)
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull(),

                Textarea::make('text_en')
                    ->label('نص الكرت (إنجليزي)')
                    ->rows(4)
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('إظهار هذا الكرت في الموقع')
                    ->helperText(
                        'عند إيقاف البطاقة لن تظهر ضمن قسم لماذا نحن في الموقع.'
                    )
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }
}