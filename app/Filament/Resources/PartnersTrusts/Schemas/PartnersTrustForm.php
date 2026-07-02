<?php

namespace App\Filament\Resources\PartnersTrusts\Schemas;

use App\Models\PartnersTrust;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class PartnersTrustForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Repeater::make('items')
                ->label('كروت ثقة الشركاء الثابتة')
                ->helperText('يمكن تعديل الأيقونة والعنوان والوصف فقط. عدد الكروت ثابت ولا يمكن إضافة أو حذف أو تغيير الترتيب.')
                ->minItems(5)
                ->maxItems(5)
                ->defaultItems(5)
                ->addable(false)
                ->deletable(false)
                ->reorderable(false)
                ->columnSpanFull()
                ->columns(1)
                ->schema([
                    Placeholder::make('icon_preview')
                        ->label('معاينة أيقونة FontAwesome الحالية')
                        ->content(function ($get): HtmlString {
                            $class = $get('icon_class') ?: 'fa-solid fa-circle';

                            return new HtmlString(
                                '<div style="display:flex;align-items:center;gap:10px;font-size:28px;line-height:1;">'
                                . '<i class="' . e($class) . '"></i>'
                                . '<span style="font-size:13px;color:#6b7280;direction:ltr;unicode-bidi:isolate;">' . e($class) . '</span>'
                                . '</div>'
                            );
                        })
                        ->columnSpanFull(),

                    Select::make('icon_class')
                        ->label('أيقونة FontAwesome الأساسية')
                        ->options(PartnersTrust::iconOptions())
                        ->searchable()
                        ->native(false)
                        ->helperText('هذه هي نفس طريقة الأيقونات الأصلية المستخدمة في اللاندنج. إذا رفعت أيقونة بديلة سيتم استخدامها بدلًا منها.')
                        ->columnSpanFull(),

                    FileUpload::make('custom_icon')
                        ->label('أيقونة بديلة اختيارية')
                        ->disk('public')
                        ->directory('partners/trust/icons')
                        ->visibility('public')
                        ->acceptedFileTypes([
                            'image/svg+xml',
                            'image/png',
                            'image/jpeg',
                            'image/webp',
                        ])
                        ->maxSize(1024)
                        ->image()
                        ->imagePreviewHeight('80')
                        ->panelLayout('grid')
                        ->openable()
                        ->downloadable()
                        ->helperText('ارفع أيقونة بديلة فقط إذا أردت استبدال أيقونة FontAwesome. الحد الأقصى 1MB.')
                        ->columnSpanFull(),

                    TextInput::make('title_ar')
                        ->label('العنوان (عربي)')
                        ->required()
                        ->maxLength(80)
                        ->columnSpanFull(),

                    TextInput::make('desc_ar')
                        ->label('الوصف الفرعي (عربي)')
                        ->required()
                        ->maxLength(140)
                        ->columnSpanFull(),

                    TextInput::make('title_en')
                        ->label('Title (English)')
                        ->required()
                        ->maxLength(80)
                        ->columnSpanFull(),

                    TextInput::make('desc_en')
                        ->label('Subtitle (English)')
                        ->required()
                        ->maxLength(140)
                        ->columnSpanFull(),
                ]),

            Toggle::make('is_active')
                ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                ->helperText('عند إيقافه سيعرض الموقع المحتوى الافتراضي المكتوب في الكود، وليس التعديلات المحفوظة في الداشبورد.')
                ->default(true)
                ->columnSpanFull(),
        ])->columns(1);
    }
}
