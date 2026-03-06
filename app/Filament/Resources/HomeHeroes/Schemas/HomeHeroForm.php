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
        return $schema->schema([
           
            TextInput::make('experience_years')
                ->label('سنوات الخبرة (بدل 15)')
                ->numeric()
                ->minValue(0)
                ->nullable(),

            FileUpload::make('slides')
    ->label('صور السلايدر (غير محدودة)')
    ->image()
    ->multiple()
    ->reorderable()
    ->appendFiles() 
    ->disk('public')
    ->directory('home/hero')
    ->visibility('public')
    ->panelLayout('grid')          
    ->imagePreviewHeight('120')    
    ->openable()                   
    ->downloadable()               
    ->maxSize(3072)
                ->helperText('الحد الأقصى 3MB لكل صورة. العدد مفتوح.'),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(false),
        ]);
    }
}
