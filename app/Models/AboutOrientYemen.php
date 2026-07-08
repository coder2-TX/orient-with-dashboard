<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutOrientYemen extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'lead_ar',
        'lead_en',
        'paragraph_1_ar',
        'paragraph_1_en',
        'paragraph_2_ar',
        'paragraph_2_en',
        'branches_label_ar',
        'branches_label_en',
        'branches',
        'closing_ar',
        'closing_en',
        'is_active',
    ];

    protected $casts = [
        'branches' => 'array',
        'is_active' => 'boolean',
    ];

    protected static ?self $activeContentCache = null;

    public static function activeContent(): self
    {
        if (static::$activeContentCache instanceof self) {
            return static::$activeContentCache;
        }

        $record = static::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();

        if (! $record) {
            $record = new static(static::defaultContent());
        }

        $record->branches = static::normalizeBranches($record->branches);

        return static::$activeContentCache = $record;
    }

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->oldest('id')->first();

        if (! $record) {
            return static::query()->create(static::defaultContent());
        }

        $branches = static::normalizeBranches($record->branches);

        if ($record->branches !== $branches) {
            $record->forceFill(['branches' => $branches])->save();
        }

        return $record;
    }

    public static function normalizeBranches(?array $branches): array
    {
        $branches = is_array($branches) ? array_values($branches) : [];

        if (empty($branches)) {
            return static::defaultBranches();
        }

        return collect($branches)
            ->filter(fn ($branch): bool => is_array($branch))
            ->map(function (array $branch): array {
                return [
                    'name_ar' => $branch['name_ar'] ?? '',
                    'name_en' => $branch['name_en'] ?? '',
                ];
            })
            ->filter(fn (array $branch): bool => filled($branch['name_ar']) || filled($branch['name_en']))
            ->values()
            ->all();
    }

    public static function defaultBranches(): array
    {
        return [
            [
                'name_ar' => 'اليمن',
                'name_en' => 'Yemen',
            ],
            [
                'name_ar' => 'المملكة العربية السعودية',
                'name_en' => 'Saudi Arabia',
            ],
            [
                'name_ar' => 'إندونيسيا',
                'name_en' => 'Indonesia',
            ],
        ];
    }

    public static function defaultContent(): array
    {
        return [
            'title_ar' => 'عن أورينت يمن',
            'title_en' => 'About Orient Yemen',

            'lead_ar' => 'تعد أورينت يمن شركة تجارية وتوزيع خاصة رائدة، تأسست عام 2007، ونجحت على مدار أكثر من 19 عاماً في بناء سمعة مرموقة كخبير في استيراد وتسويق وتوزيع المنتجات الغذائية والمشروبات.',
            'lead_en' => 'Orient Yemen is a company specialized in importing and marketing products.',

            'paragraph_1_ar' => 'ترتكز مهمتنا على ربط الموردين بالأسواق العالمية وبناء حضور منظم ومستقر للعلامات التجارية، حيث نمتلك شبكة توزيع واسعة وشاملة تغطي كافة أنحاء اليمن، لتصل خدماتنا بكفاءة عالية إلى السوبر ماركت وتجار الجملة والتجزئة في كل مكان.',
            'paragraph_1_en' => 'Established in 2007, it focuses on building a structured and sustainable commercial presence for brands across multiple markets.',

            'paragraph_2_ar' => 'وبفضل حضورنا الإقليمي القوي، نتمكن من تقديم حلول تجارية وتسويقية مرنة وقابلة للتوسع.',
            'paragraph_2_en' => 'Since its launch, the company has followed a clear approach based on understanding market dynamics, building long-term relationships with suppliers and partners, and delivering practical solutions that connect products to target markets efficiently and reliably.',

            'branches_label_ar' => 'عبر فروعنا الممتدة في',
            'branches_label_en' => 'Through its branches',

            'branches' => static::defaultBranches(),

            'closing_ar' => 'نحن نؤمن بأن نجاح المنتجات لا يعتمد فقط على جودتها، بل على استراتيجية دخولها للسوق وبناء علاقات موثوقة وطويلة الأمد تضمن منفعة المستهلكين والموردين على حد سواء.',
            'closing_en' => 'This gives the company stronger capabilities to manage operations across diverse geographies, understand each market’s requirements, and adapt flexibly to supply and marketing chains.',

            'is_active' => true,
        ];
    }
}