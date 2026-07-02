<?php

namespace App\Filament\Resources\HomeFacts\Schemas;

use App\Models\HomeFact;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeFactForm
{
    public static function configure(Schema $schema): Schema
    {
        $plusRule = ['regex:/^\+?\d+\+?$/'];

        return $schema
            ->columns(1)
            ->schema([
                Section::make('الأرقام المعروضة في الصفحة الرئيسية')
                    ->description('عدّل الأرقام فقط، وسيتم عرض النصوص الثابتة في الموقع بنفس ترتيب الكروت الحالية.')
                    ->columnSpanFull()
                    ->columns(1)
                    ->schema([
                        TextInput::make('team_count')
                            ->label('كادر بشري متخصص')
                            ->placeholder(HomeFact::DEFAULT_COUNTS['team_count'])
                            ->helperText('يسمح بإضافة علامة + قبل أو بعد الرقم، مثل: +80 أو 80+ أو 80.')
                            ->rules($plusRule)
                            ->maxLength(20)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('vehicles_count')
                            ->label('مركبات توزيع حديثة')
                            ->placeholder(HomeFact::DEFAULT_COUNTS['vehicles_count'])
                            ->helperText('يسمح بإضافة علامة + قبل أو بعد الرقم، مثل: +17 أو 17+ أو 17.')
                            ->rules($plusRule)
                            ->maxLength(20)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('warehouses_count')
                            ->label('مستودعات مركزية')
                            ->placeholder(HomeFact::DEFAULT_COUNTS['warehouses_count'])
                            ->helperText('يسمح بإضافة علامة + قبل أو بعد الرقم، مثل: +8 أو 8+ أو 8.')
                            ->rules($plusRule)
                            ->maxLength(20)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('pos_count')
                            ->label('نقاط بيع معتمدة')
                            ->placeholder(HomeFact::DEFAULT_COUNTS['pos_count'])
                            ->helperText('يسمح بإضافة علامة + قبل أو بعد الرقم، مثل: +8 أو 8+ أو 8.')
                            ->rules($plusRule)
                            ->maxLength(20)
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('اعتماد المحتوى')
                    ->description('عند تفعيل هذا الخيار، يتم عرض أرقام الداشبورد في اللاندنج بدل الأرقام الافتراضية الموجودة في الكود.')
                    ->columnSpanFull()
                    ->columns(1)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                            ->helperText('اتركه غير مفعل إذا أردت استمرار عرض الأرقام الافتراضية في اللاندنج.')
                            ->default(false)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
