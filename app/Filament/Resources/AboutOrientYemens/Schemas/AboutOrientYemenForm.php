<?php

namespace App\Filament\Resources\AboutOrientYemens\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AboutOrientYemenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(1)->schema([
            TextInput::make('title_ar')
                ->label('العنوان الرئيسي (عربي)')
                ->required()
                ->maxLength(120)
                ->columnSpanFull(),

            TextInput::make('title_en')
                ->label('Main Title (English)')
                ->required()
                ->maxLength(120)
                ->columnSpanFull(),

            Textarea::make('lead_ar')
                ->label('الفقرة الأولى البارزة (عربي)')
                ->required()
                ->rows(4)
                ->maxLength(1200)
                ->columnSpanFull(),

            Textarea::make('lead_en')
                ->label('Lead Paragraph (English)')
                ->required()
                ->rows(4)
                ->maxLength(1200)
                ->columnSpanFull(),

            Textarea::make('paragraph_1_ar')
                ->label('الفقرة الثانية (عربي)')
                ->required()
                ->rows(4)
                ->maxLength(1500)
                ->columnSpanFull(),

            Textarea::make('paragraph_1_en')
                ->label('Second Paragraph (English)')
                ->required()
                ->rows(4)
                ->maxLength(1500)
                ->columnSpanFull(),

            Textarea::make('paragraph_2_ar')
                ->label('الفقرة الثالثة (عربي)')
                ->required()
                ->rows(3)
                ->maxLength(1000)
                ->columnSpanFull(),

            Textarea::make('paragraph_2_en')
                ->label('Third Paragraph (English)')
                ->required()
                ->rows(4)
                ->maxLength(1500)
                ->columnSpanFull(),

            TextInput::make('branches_label_ar')
                ->label('عنوان الفروع (عربي)')
                ->required()
                ->maxLength(120)
                ->helperText('مثال: عبر فروعنا الممتدة في')
                ->columnSpanFull(),

            TextInput::make('branches_label_en')
                ->label('Branches Label (English)')
                ->required()
                ->maxLength(120)
                ->helperText('Example: Through its branches')
                ->columnSpanFull(),

            Repeater::make('branches')
                ->label('فروع الشركة')
                ->helperText('يمكن إضافة فروع جديدة أو حذفها أو إعادة ترتيبها. أي فرع جديد سيظهر في الموقع بنفس التصميم وبأيقونة الموقع تلقائيًا.')
                ->minItems(1)
                ->maxItems(12)
                ->defaultItems(3)
                ->addable()
                ->deletable()
                ->reorderable()
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    TextInput::make('name_ar')
                        ->label('اسم الفرع (عربي)')
                        ->required()
                        ->maxLength(120),

                    TextInput::make('name_en')
                        ->label('Branch Name (English)')
                        ->required()
                        ->maxLength(120),
                ]),

            Textarea::make('closing_ar')
                ->label('الفقرة الختامية (عربي)')
                ->required()
                ->rows(4)
                ->maxLength(1500)
                ->columnSpanFull(),

            Textarea::make('closing_en')
                ->label('Closing Paragraph (English)')
                ->required()
                ->rows(4)
                ->maxLength(1500)
                ->columnSpanFull(),

            Toggle::make('is_active')
                ->label('اعتماد محتوى الداشبورد')
                ->default(true)
                ->columnSpanFull(),
        ]);
    }
}