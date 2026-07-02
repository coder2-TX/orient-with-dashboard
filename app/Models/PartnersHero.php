<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnersHero extends Model
{
    public const DEFAULT_TITLE_AR = 'شركاؤنا';
    public const DEFAULT_TITLE_EN = 'Our Partners';

    public const DEFAULT_LEAD_AR = "نؤمن في أورينت يمن أن الشراكات القوية هي أساس النجاح والاستمرارية.\nنفخر بتعاوننا مع مجموعة من الشركاء الذين يشاركوننا نفس القيم في الجودة، الموثوقية، والالتزام بخدمة السوق.";
    public const DEFAULT_LEAD_EN = "At Orient Yemen, we believe strong partnerships are the foundation of success and continuity.\nWe are proud to collaborate with partners who share our values of quality, reliability, and commitment to serving the market.";

    protected $fillable = [
        'title_text_ar',
        'title_text_en',
        'lead_text_ar',
        'lead_text_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function defaults(): array
    {
        return [
            'title_text_ar' => self::DEFAULT_TITLE_AR,
            'title_text_en' => self::DEFAULT_TITLE_EN,
            'lead_text_ar' => self::DEFAULT_LEAD_AR,
            'lead_text_en' => self::DEFAULT_LEAD_EN,
            'is_active' => true,
        ];
    }

    public static function firstOrCreateDefault(): self
    {
        $record = self::query()->latest('id')->first();

        if ($record) {
            return $record;
        }

        return self::query()->create(self::defaults());
    }

    /**
     * Return dashboard content only when explicitly enabled.
     * Do not create or return the default dashboard record here, otherwise
     * disabling "dashboard content" would still show saved dashboard values.
     */
    public static function activeContent(): ?self
    {
        return self::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();
    }

    public static function displayValue(?self $record, string $field, string $fallback): string
    {
        $value = trim((string) ($record?->{$field} ?? ''));

        return $value !== '' ? $value : $fallback;
    }
}
