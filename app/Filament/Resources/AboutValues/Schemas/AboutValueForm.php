<?php

namespace App\Filament\Resources\AboutValues\Schemas;

use App\Models\AboutValue;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class AboutValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('title_text_ar')
                    ->label('عنوان السكشن (عربي)')
                    ->default(AboutValue::DEFAULT_TITLE_AR)
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('title_text_en')
                    ->label('Section title (English)')
                    ->default(AboutValue::DEFAULT_TITLE_EN)
                    ->maxLength(190)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('intro_text_ar')
                    ->label('نص قيمنا (عربي)')
                    ->default(AboutValue::DEFAULT_INTRO_AR)
                    ->rows(3)
                    ->nullable()
                    ->columnSpanFull(),

                Textarea::make('intro_text_en')
                    ->label('Our Values text (English)')
                    ->default(AboutValue::DEFAULT_INTRO_EN)
                    ->rows(3)
                    ->nullable()
                    ->columnSpanFull(),

                Repeater::make('items')
                    ->label('عناصر القيم')
                    ->helperText('العدد الطبيعي 5 قيم. يمكن إضافة قيمة سادسة فقط، ولا يمكن تقليل العدد عن 5 أو تجاوز 6. يتم استخدام أيقونات FontAwesome مثل سكشن منهجية العمل.')
                    ->minItems(5)
                    ->maxItems(6)
                    ->default(AboutValue::defaultItems())
                    ->reorderable()
                    ->addActionLabel('إضافة قيمة سادسة')
                    ->columns(1)
                    ->schema([
                        Placeholder::make('icon_preview')
                            ->label('معاينة الأيقونة الأصلية')
                            ->content(function ($get): HtmlString {
                                $iconClass = trim((string) ($get('icon_class') ?: 'fa-solid fa-circle-check'));
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
                            ->options(fn ($state): array => self::iconOptions($state))
                            ->native(false)
                            ->searchable()
                            ->required()
                            ->default('fa-solid fa-circle-check')
                            ->afterStateHydrated(function (Select $component, $state): void {
                                if (blank($state)) {
                                    $component->state('fa-solid fa-circle-check');
                                }
                            })
                            ->helperText('اختاري من أيقونات FontAwesome الأصلية. هذه لا ترفع ملفات ولا تؤثر على الأداء.')
                            ->columnSpanFull(),

                        FileUpload::make('custom_icon')
                            ->label('أيقونة بديلة اختيارية')
                            ->hint('الحد الأقصى 1MB لكل صورة')
                            ->hintColor('danger')
                            ->helperText('استخدمي هذا الحقل فقط إذا أردتِ استبدال أيقونة FontAwesome بصورة. اتركيه فارغًا للحفاظ على الأيقونة الأصلية.')
                            ->disk('public')
                            ->directory('about/values/icons/custom')
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
                    ])
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('اعتماد محتوى الداشبورد بدل المحتوى الافتراضي')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }

    protected static function iconOptions(?string $currentValue = null): array
    {
        $options = [
            'fa-solid fa-circle-check' => 'Circle Check',
            'fa-solid fa-check-circle' => 'Check Circle',
            'fa-solid fa-handshake' => 'Handshake',
            'fa-solid fa-award' => 'Award',
            'fa-solid fa-user-tie' => 'Professional',
            'fa-solid fa-users' => 'Users',
            'fa-solid fa-lightbulb' => 'Lightbulb',
            'fa-solid fa-shield-heart' => 'Shield Heart',
            'fa-solid fa-shield-halved' => 'Shield',
            'fa-solid fa-star' => 'Star',
            'fa-solid fa-medal' => 'Medal',
            'fa-solid fa-gem' => 'Gem',
            'fa-solid fa-scale-balanced' => 'Balance',
            'fa-solid fa-chart-line' => 'Growth',
            'fa-solid fa-people-group' => 'Team',
            'fa-solid fa-briefcase' => 'Briefcase',
            'fa-solid fa-thumbs-up' => 'Thumbs Up',
            'fa-solid fa-heart' => 'Heart',
            'fa-solid fa-sitemap' => 'Structure',
            'fa-solid fa-seedling' => 'Growth Seedling',
            'fa-solid fa-bullseye' => 'Target',
            'fa-solid fa-compass' => 'Compass',
            'fa-solid fa-rocket' => 'Rocket',
            'fa-solid fa-layer-group' => 'Layers',
            'fa-solid fa-circle' => 'Circle',
        ];

        $currentValue = trim((string) $currentValue);

        if ($currentValue !== '' && ! array_key_exists($currentValue, $options)) {
            $options = [$currentValue => $currentValue] + $options;
        }

        return $options;
    }
}