<?php

namespace App\Filament\Resources\PartnersHeroes\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PartnersHeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Textarea::make('lead_text_ar')
                ->label('النص تحت "شركاؤنا" (عربي)')
                ->rows(4)
                ->nullable(),

            Textarea::make('lead_text_en')
                ->label('Text under "Our Partners" (English)')
                ->rows(4)
                ->nullable(),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(true),
        ]);
    }
}
