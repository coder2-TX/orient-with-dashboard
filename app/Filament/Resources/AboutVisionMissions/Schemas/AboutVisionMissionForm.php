<?php

namespace App\Filament\Resources\AboutVisionMissions\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AboutVisionMissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('section_title_ar')
                    ->label('عنوان السكشن (عربي)')
                    ->placeholder('رؤيتنا ورسالتنا')
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('section_title_en')
                    ->label('Section title (English)')
                    ->placeholder('Our Vision & Mission')
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('intro_text_ar')
                    ->label('النص تحت العنوان (عربي)')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('intro_text_en')
                    ->label('Intro text (English)')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('vision_title_ar')
                    ->label('عنوان كرت الرؤية (عربي)')
                    ->placeholder('رؤيتنا')
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('vision_title_en')
                    ->label('Vision card title (English)')
                    ->placeholder('Our Vision')
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('vision_text_ar')
                    ->label('نص الرؤية (عربي)')
                    ->rows(6)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('vision_text_en')
                    ->label('Vision text (English)')
                    ->rows(6)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('mission_title_ar')
                    ->label('عنوان كرت الرسالة (عربي)')
                    ->placeholder('رسالتنا')
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('mission_title_en')
                    ->label('Mission card title (English)')
                    ->placeholder('Our Mission')
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('mission_text_ar')
                    ->label('نص الرسالة (عربي)')
                    ->rows(7)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('mission_text_en')
                    ->label('Mission text (English)')
                    ->rows(7)
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                    ->helperText('عند إيقاف هذا الخيار سيعرض الموقع المحتوى الافتراضي الموجود في الكود.')
                    ->default(true)
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
