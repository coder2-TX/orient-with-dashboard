<?php

namespace App\Filament\Resources\HomeAbouts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeAboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Textarea::make('body.ar')
                ->label('النص (عربي)')
                ->rows(6)
                ->required(),

            Textarea::make('body.en')
                ->label('النص (إنجليزي)')
                ->rows(6)
                ->required(),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(false),
        ]);
    }
}
