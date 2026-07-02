<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class AboutVisionMission extends Model
{
    public const DEFAULT_CONTENT = [
        'section_title_ar' => 'رؤيتنا ورسالتنا',
        'section_title_en' => 'Our Vision & Mission',
        'intro_text_ar' => 'نعمل وفق نهج واضح يركّز على بناء حضور تجاري مستقر ومستدام للعلامات التجارية عبر أسواق متعددة.',
        'intro_text_en' => 'We operate with a clear approach focused on building a stable and sustainable commercial presence for brands across multiple markets.',
        'vision_title_ar' => 'رؤيتنا',
        'vision_title_en' => 'Our Vision',
        'vision_text_ar' => 'نسعى في أورينت يمن إلى أن نكون شريكًا تجاريًا موثوقًا في استيراد وتسويق المنتجات، وأن نُسهم في بناء علامات تجارية قوية وقادرة على الاستمرار والنمو في الأسواق التي نعمل بها.',
        'vision_text_en' => 'At Orient Yemen, we aspire to be a trusted commercial partner in importing and marketing products, contributing to building strong brands that can sustain and grow in the markets we serve.',
        'mission_title_ar' => 'رسالتنا',
        'mission_title_en' => 'Our Mission',
        'mission_text_ar' => 'تتمثّل رسالتنا في أورينت يمن في تقديم حلول متكاملة في استيراد وتسويق المنتجات، وبناء علاقات تجارية قائمة على الثقة والاستمرارية، من خلال فهم عميق للأسواق، وإدارة منظّمة لسلاسل التوريد، ودعم العلامات التجارية للوصول إلى حضور تجاري مستقر ومستدام.',
        'mission_text_en' => 'Our mission is to provide integrated solutions for importing and marketing products, and to build long-term business relationships based on trust and continuity, through deep market understanding, organized supply-chain management, and supporting brands to achieve a stable and sustainable commercial presence.',
        'is_active' => true,
    ];

    protected $fillable = [
        'section_title_ar',
        'section_title_en',
        'intro_text_ar',
        'intro_text_en',
        'vision_title_ar',
        'vision_title_en',
        'vision_text_ar',
        'vision_text_en',
        'mission_title_ar',
        'mission_title_en',
        'mission_text_ar',
        'mission_text_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static ?self $activeRecord = null;

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->oldest('id')->first();

        if ($record) {
            static::fillMissingDefaultContent($record);

            return $record;
        }

        return static::query()->create(static::defaultAttributesForCurrentSchema());
    }

    public static function activeContent(): ?self
    {
        if (static::$activeRecord instanceof self) {
            return static::$activeRecord;
        }

        return static::$activeRecord = static::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();
    }

    public static function defaultValue(string $key): string
    {
        return (string) (static::DEFAULT_CONTENT[$key] ?? '');
    }

    protected static function fillMissingDefaultContent(self $record): void
    {
        $updates = [];

        foreach (static::defaultAttributesForCurrentSchema() as $key => $value) {
            if ($key === 'is_active') {
                continue;
            }

            if (blank($record->{$key})) {
                $updates[$key] = $value;
            }
        }

        if (! $record->is_active && Schema::hasColumn($record->getTable(), 'is_active')) {
            $updates['is_active'] = true;
        }

        if ($updates !== []) {
            $record->forceFill($updates)->save();
            $record->refresh();
        }
    }

    protected static function defaultAttributesForCurrentSchema(): array
    {
        $model = new static();
        $table = $model->getTable();

        return collect(static::DEFAULT_CONTENT)
            ->filter(fn ($value, string $key): bool => Schema::hasColumn($table, $key))
            ->all();
    }
}
