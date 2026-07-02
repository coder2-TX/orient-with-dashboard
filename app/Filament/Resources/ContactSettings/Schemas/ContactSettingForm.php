<?php

namespace App\Filament\Resources\ContactSettings\Schemas;

use Filament\Forms\Components\Repeater;
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
                Section::make('محتوى أعلى بيانات التواصل')
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

                Section::make('بيانات التواصل')
                    ->schema([
                        TextInput::make('email_label_ar')
                            ->label('تسمية البريد الإلكتروني (عربي)')
                            ->required()
                            ->maxLength(120)
                            ->columnSpanFull(),

                        TextInput::make('email_label_en')
                            ->label('تسمية البريد الإلكتروني (إنجليزي)')
                            ->required()
                            ->maxLength(120)
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->email()
                            ->required()
                            ->maxLength(190)
                            ->columnSpanFull(),

                        TextInput::make('phone_label_ar')
                            ->label('تسمية الهاتف (عربي)')
                            ->required()
                            ->maxLength(120)
                            ->columnSpanFull(),

                        TextInput::make('phone_label_en')
                            ->label('تسمية الهاتف (إنجليزي)')
                            ->required()
                            ->maxLength(120)
                            ->columnSpanFull(),

                        TextInput::make('phone_display')
                            ->label('رقم الهاتف المعروض')
                            ->helperText('اكتب الرقم كما تريد أن يظهر للزائر، مثل: +967 734888880')
                            ->required()
                            ->maxLength(60)
                            ->columnSpanFull(),

                        TextInput::make('whatsapp_label_ar')
                            ->label('تسمية واتساب (عربي)')
                            ->required()
                            ->maxLength(120)
                            ->columnSpanFull(),

                        TextInput::make('whatsapp_label_en')
                            ->label('تسمية واتساب (إنجليزي)')
                            ->required()
                            ->maxLength(120)
                            ->columnSpanFull(),

                        TextInput::make('whatsapp_display')
                            ->label('رقم واتساب استقبال رسائل نموذج التواصل')
                            ->helperText('هذا الرقم سيظهر للزائر ضمن بيانات التواصل، وسيُستخدم أيضًا كرقم واتساب الذي يستقبل رسائل نموذج التواصل بعد الضغط على زر الإرسال.')
                            ->required()
                            ->maxLength(60)
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('مواقعنا')
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

                        Repeater::make('locations')
                            ->label('قائمة الدول')
                            ->schema([
                                TextInput::make('name_ar')
                                    ->label('الدولة (عربي)')
                                    ->required()
                                    ->maxLength(120)
                                    ->columnSpanFull(),

                                TextInput::make('name_en')
                                    ->label('Country (English)')
                                    ->required()
                                    ->maxLength(120)
                                    ->columnSpanFull(),
                            ])
                            ->columns(1)
                            ->minItems(1)
                            ->defaultItems(3)
                            ->addActionLabel('إضافة دولة')
                            ->reorderable()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                Section::make('نموذج التواصل')
                    ->schema([
                        TextInput::make('form_title_ar')->label('عنوان النموذج (عربي)')->required()->maxLength(190)->columnSpanFull(),
                        TextInput::make('form_title_en')->label('عنوان النموذج (إنجليزي)')->required()->maxLength(190)->columnSpanFull(),
                        Textarea::make('form_description_ar')->label('وصف النموذج (عربي)')->rows(3)->required()->columnSpanFull(),
                        Textarea::make('form_description_en')->label('وصف النموذج (إنجليزي)')->rows(3)->required()->columnSpanFull(),

                        TextInput::make('form_full_name_label_ar')->label('تسمية الاسم الكامل (عربي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_full_name_label_en')->label('تسمية الاسم الكامل (إنجليزي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_full_name_placeholder_ar')->label('Placeholder الاسم الكامل (عربي)')->required()->maxLength(190)->columnSpanFull(),
                        TextInput::make('form_full_name_placeholder_en')->label('Placeholder الاسم الكامل (إنجليزي)')->required()->maxLength(190)->columnSpanFull(),

                        TextInput::make('form_email_label_ar')->label('تسمية البريد في النموذج (عربي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_email_label_en')->label('تسمية البريد في النموذج (إنجليزي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_email_placeholder_ar')->label('Placeholder البريد (عربي)')->required()->maxLength(190)->columnSpanFull(),
                        TextInput::make('form_email_placeholder_en')->label('Placeholder البريد (إنجليزي)')->required()->maxLength(190)->columnSpanFull(),

                        TextInput::make('form_phone_label_ar')->label('تسمية الهاتف في النموذج (عربي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_phone_label_en')->label('تسمية الهاتف في النموذج (إنجليزي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_phone_placeholder_ar')->label('Placeholder الهاتف (عربي)')->required()->maxLength(190)->columnSpanFull(),
                        TextInput::make('form_phone_placeholder_en')->label('Placeholder الهاتف (إنجليزي)')->required()->maxLength(190)->columnSpanFull(),

                        TextInput::make('form_subject_label_ar')->label('تسمية الموضوع (عربي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_subject_label_en')->label('تسمية الموضوع (إنجليزي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_subject_placeholder_ar')->label('Placeholder الموضوع (عربي)')->required()->maxLength(190)->columnSpanFull(),
                        TextInput::make('form_subject_placeholder_en')->label('Placeholder الموضوع (إنجليزي)')->required()->maxLength(190)->columnSpanFull(),

                        TextInput::make('form_message_label_ar')->label('تسمية الرسالة (عربي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_message_label_en')->label('تسمية الرسالة (إنجليزي)')->required()->maxLength(120)->columnSpanFull(),
                        Textarea::make('form_message_placeholder_ar')->label('Placeholder الرسالة (عربي)')->rows(2)->required()->columnSpanFull(),
                        Textarea::make('form_message_placeholder_en')->label('Placeholder الرسالة (إنجليزي)')->rows(2)->required()->columnSpanFull(),

                        TextInput::make('form_submit_label_ar')->label('نص زر الإرسال (عربي)')->required()->maxLength(120)->columnSpanFull(),
                        TextInput::make('form_submit_label_en')->label('نص زر الإرسال (إنجليزي)')->required()->maxLength(120)->columnSpanFull(),
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

                        TextInput::make('map_title_ar')
                            ->label('عنوان الخريطة (عربي)')
                            ->required()
                            ->maxLength(190)
                            ->columnSpanFull(),

                        TextInput::make('map_title_en')
                            ->label('عنوان الخريطة (إنجليزي)')
                            ->required()
                            ->maxLength(190)
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
