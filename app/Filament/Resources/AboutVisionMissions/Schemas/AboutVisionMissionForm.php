<?php

namespace App\Filament\Resources\AboutVisionMissions\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AboutVisionMissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Textarea::make('intro_text_ar')
                ->label('النص تحت العنوان (عربي)')
                ->rows(3)
                ->nullable(),

            Textarea::make('intro_text_en')
                ->label('Intro text (English)')
                ->rows(3)
                ->nullable(),

            Textarea::make('vision_text_ar')
                ->label('نص الرؤية (عربي)')
                ->rows(5)
                ->nullable(),

            Textarea::make('vision_text_en')
                ->label('Vision text (English)')
                ->rows(5)
                ->nullable(),

            Textarea::make('mission_text_ar')
                ->label('نص الرسالة (عربي)')
                ->rows(6)
                ->nullable(),

            Textarea::make('mission_text_en')
                ->label('Mission text (English)')
                ->rows(6)
                ->nullable(),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(true),
        ]);
    }
}
