<?php

namespace App\Filament\Resources\ContactSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Section::make('محتوى بيانات التواصل')
                    ->description('البريد والهاتف والواتساب والدول تُدار من نافذة الفوتر وتظهر هنا تلقائيًا بدون تكرار.')
                    ->schema([
                        TextInput::make('title_ar')
                            ->label('عنوان السكشن (عربي)')
                            ->required()
                            ->maxLength(190)
                            ->columnSpanFull(),

                        TextInput::make('title_en')
                            ->label('عنوان السكشن (إنجليزي)')
                            ->required()
                            ->maxLength(190)
                            ->columnSpanFull(),

                        Textarea::make('lead_ar')
                            ->label('النص التوضيحي (عربي)')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('lead_en')
                            ->label('النص التوضيحي (إنجليزي)')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('محتوى المواقع')
                    ->description('قائمة الدول نفسها تُدار من نافذة الفوتر.')
                    ->schema([
                        TextInput::make('locations_title_ar')
                            ->label('عنوان المواقع (عربي)')
                            ->required()
                            ->maxLength(190)
                            ->columnSpanFull(),

                        TextInput::make('locations_title_en')
                            ->label('عنوان المواقع (إنجليزي)')
                            ->required()
                            ->maxLength(190)
                            ->columnSpanFull(),

                        Textarea::make('locations_description_ar')
                            ->label('وصف المواقع (عربي)')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('locations_description_en')
                            ->label('وصف المواقع (إنجليزي)')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('مقدمة نموذج التواصل')
                    ->description('تسميات الحقول والـPlaceholder ثابتة في التصميم حتى لا تتشتت إعدادات المستخدم.')
                    ->schema([
                        TextInput::make('whatsapp_display')
                            ->label('رقم واتساب استلام رسائل نموذج التواصل')
                            ->helperText('هذا الرقم يستقبل الرسائل المرسلة من نموذج التواصل، وهو مستقل عن رقم واتساب المعروض في الفوتر.')
                            ->tel()
                            ->required()
                            ->maxLength(60)
                            ->columnSpanFull(),

                        TextInput::make('form_title_ar')
                            ->label('عنوان النموذج (عربي)')
                            ->required()
                            ->maxLength(190)
                            ->columnSpanFull(),

                        TextInput::make('form_title_en')
                            ->label('عنوان النموذج (إنجليزي)')
                            ->required()
                            ->maxLength(190)
                            ->columnSpanFull(),

                        Textarea::make('form_description_ar')
                            ->label('وصف النموذج (عربي)')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('form_description_en')
                            ->label('وصف النموذج (إنجليزي)')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('الخريطة وحالة النشر')
                    ->schema([
                        TextInput::make('map_embed_url')
                            ->label('رابط تضمين الخريطة')
                            ->helperText('ضع قيمة src من iframe الخاص بـ Google Maps، وليس كود iframe كامل.')
                            ->url()
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                            ->default(true)
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }
}
