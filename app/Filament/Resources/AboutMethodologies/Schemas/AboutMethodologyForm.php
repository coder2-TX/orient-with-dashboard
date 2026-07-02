<?php

namespace App\Filament\Resources\AboutMethodologies\Schemas;

use App\Models\AboutMethodology;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class AboutMethodologyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(1)->schema([
            Repeater::make('items')
                ->label('كروت منهجية العمل الثابتة')
                ->helperText('عدد الكروت ثابت 5. يمكن تعديل الأيقونة والعنوان والوصف فقط، ولا يمكن الإضافة أو الحذف أو تغيير الترتيب.')
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
                        ->label('معاينة الأيقونة الأصلية')
                        ->content(function ($get): HtmlString {
                            $iconClass = trim((string) ($get('icon_class') ?: 'fa-solid fa-circle'));
                            $safeIconClass = e($iconClass);

                            return new HtmlString(
                                '<div style="display:flex;align-items:center;gap:10px;padding:10px 12px;border:1px solid #e5e7eb;border-radius:12px;background:#fafafa;">'
                                . '<i class="' . $safeIconClass . '" style="font-size:28px;color:#f97316;"></i>'
                                . '<span style="font-size:13px;color:#6b7280;">هذه هي أيقونة FontAwesome الأصلية المستخدمة في اللاندنج. اترك الأيقونة البديلة فارغة لاستخدامها كما هي.</span>'
                                . '</div>'
                            );
                        })
                        ->columnSpanFull(),

                    Select::make('icon_class')
                        ->label('الأيقونة الأصلية')
                        ->options(AboutMethodology::iconOptions())
                        ->native(false)
                        ->searchable()
                        ->required()
                        ->helperText('اختاري من الأيقونات الأصلية المتاحة. هذه لا ترفع ملفات ولا تؤثر على الأداء.')
                        ->columnSpanFull(),

                    FileUpload::make('custom_icon')
                        ->label('أيقونة بديلة اختيارية')
                        ->helperText('استخدمي هذا الحقل فقط إذا أردتِ استبدال أيقونة FontAwesome بصورة. اتركيه فارغًا للحفاظ على الأيقونة الأصلية.')
                        ->disk('public')
                        ->directory('about/method/icons/custom')
                        ->visibility('public')
                        ->acceptedFileTypes([
                            'image/svg+xml',
                            'image/png',
                            'image/jpeg',
                            'image/webp',
                        ])
                        ->image()
                        ->imagePreviewHeight('80')
                        ->panelLayout('grid')
                        ->openable()
                        ->downloadable()
                        ->maxSize(1024)
                        ->nullable()
                        ->columnSpanFull(),

                    TextInput::make('title_ar')
                        ->label('العنوان (عربي)')
                        ->required()
                        ->maxLength(80)
                        ->columnSpanFull(),

                    TextInput::make('desc_ar')
                        ->label('الوصف (عربي)')
                        ->required()
                        ->maxLength(140)
                        ->columnSpanFull(),

                    TextInput::make('title_en')
                        ->label('Title (English)')
                        ->required()
                        ->maxLength(80)
                        ->columnSpanFull(),

                    TextInput::make('desc_en')
                        ->label('Description (English)')
                        ->required()
                        ->maxLength(140)
                        ->columnSpanFull(),
                ]),

            Toggle::make('is_active')
                ->label('إظهار سكشن منهجية العمل في الموقع')
                ->default(true)
                ->columnSpanFull(),
        ]);
    }
}
