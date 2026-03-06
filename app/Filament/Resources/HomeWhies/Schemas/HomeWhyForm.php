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
        return $schema->schema([
            TextInput::make('sort_order')
                ->label('الترتيب')
                ->numeric()
                ->minValue(1)
                ->default(1)
                ->required(),

            Textarea::make('text_ar')
                ->label('نص الكرت (عربي)')
                ->rows(3)
                ->required(),

            Textarea::make('text_en')
                ->label('Card text (English)')
                ->rows(3)
                ->required(),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(true),
        ]);
    }
}
