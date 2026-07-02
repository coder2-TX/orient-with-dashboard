<?php

namespace App\Filament\Resources\HomeWhies\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeWhyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                TextInput::make('sort_order')
                    ->label('ترتيب الكرت')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(4)
                    ->required()
                    ->helperText('يتم عرض أول 4 كروت حسب الترتيب.')
                    ->columnSpanFull(),

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
                    ->helperText('عند إيقاف الكرت لن يظهر ضمن سكشن لماذا نحن في اللاندنج.')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }
}
