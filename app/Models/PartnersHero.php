<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnersHero extends Model
{
    public const DEFAULT_TITLE_AR = 'شركاؤنا';
    public const DEFAULT_TITLE_EN = 'Our Partners';

    public const DEFAULT_LEAD_AR = "نؤمن في أورينت يمن أن الشراكات القوية هي أساس النجاح والاستمرارية.\nنفخر بتعاوننا مع مجموعة من الشركاء الذين يشاركوننا نفس القيم في الجودة، الموثوقية، والالتزام بخدمة السوق.";
    public const DEFAULT_LEAD_EN = "At Orient Yemen, we believe strong partnerships are the foundation of success and continuity.\nWe are proud to collaborate with partners who share our values of quality, reliability, and commitment to serving the market.";

    protected static ?self $activeContentCache = null;

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

    public static function defaultData(): array
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
        $record = self::query()->oldest('id')->first();

        if (! $record) {
            return self::query()->create(self::defaultData());
        }

        $updates = [];

        foreach (self::defaultData() as $key => $value) {
            if ($key === 'is_active') {
                continue;
            }

            if (blank($record->{$key})) {
                $updates[$key] = $value;
            }
        }

        if ($updates !== []) {
            $record->forceFill($updates)->save();
            $record->refresh();
        }

        return $record;
    }

    public static function activeContent(): self
    {
        if (self::$activeContentCache instanceof self) {
            return self::$activeContentCache;
        }

        return self::$activeContentCache = self::query()
            ->where('is_active', true)
            ->latest('id')
            ->first()
            ?? self::firstOrCreateDefault();
    }

    public function titleAr(): string
    {
        return filled($this->title_text_ar) ? (string) $this->title_text_ar : self::DEFAULT_TITLE_AR;
    }

    public function titleEn(): string
    {
        return filled($this->title_text_en) ? (string) $this->title_text_en : self::DEFAULT_TITLE_EN;
    }

    public function leadAr(): string
    {
        return filled($this->lead_text_ar) ? (string) $this->lead_text_ar : self::DEFAULT_LEAD_AR;
    }

    public function leadEn(): string
    {
        return filled($this->lead_text_en) ? (string) $this->lead_text_en : self::DEFAULT_LEAD_EN;
    }
}
