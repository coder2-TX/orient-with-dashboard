<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected static ?self $activeDefaultCache = null;

    protected $fillable = [
        'title_ar',
        'title_en',
        'lead_ar',
        'lead_en',
        'locations_title_ar',
        'locations_title_en',
        'locations_description_ar',
        'locations_description_en',
        'form_title_ar',
        'form_title_en',
        'form_description_ar',
        'form_description_en',
        'whatsapp_display',
        'map_embed_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function defaultData(): array
    {
        return [
            'title_ar' => 'تواصل معنا',
            'title_en' => 'Contact Us',
            'lead_ar' => 'يسعدنا استقبال استفساراتكم ومقترحاتكم عبر القنوات التالية:',
            'lead_en' => 'We are happy to receive your inquiries and suggestions through the following channels:',

            'locations_title_ar' => 'مواقعنا',
            'locations_title_en' => 'Our Locations',
            'locations_description_ar' => 'تعمل أورينت يمن عبر شبكة فروع إقليمية، بما يتيح تواصلًا مباشرًا ودعمًا مستمرًا في الأسواق التي نعمل بها:',
            'locations_description_en' => 'Orient Yemen operates through a regional branch network, enabling direct communication and continuous support in the markets we serve:',

            'form_title_ar' => 'نموذج التواصل',
            'form_title_en' => 'Contact Form',
            'form_description_ar' => 'يمكنكم إرسال رسالتكم مباشرة عبر النموذج التالي، وسيتم التواصل معكم في أقرب وقت:',
            'form_description_en' => 'You can send your message directly using the form below, and we will get back to you as soon as possible:',

            'whatsapp_display' => '+967 778 080 700',

            'map_embed_url' => 'https://www.google.com/maps?q=75XV%2BPHG%20%D8%B4%D8%B1%D9%83%D8%A9%20%D8%A3%D9%88%D8%B1%D9%8A%D9%86%D8%AA%20%D9%8A%D9%85%D9%86%2C%20Zero%20St%2C%20Sanaa%2C%20Yemen&z=18&output=embed',
            'is_active' => true,
        ];
    }

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->orderBy('id')->first();
        $defaults = static::defaultData();

        if (! $record) {
            return static::query()->create($defaults);
        }

        $changed = false;

        foreach ($defaults as $key => $value) {
            $current = $record->getAttribute($key);

            if ($current === null || $current === '') {
                $record->setAttribute($key, $value);
                $changed = true;
            }
        }

        if ($changed) {
            $record->save();
        }

        return $record;
    }

    public static function activeOrDefault(): self
    {
        if (static::$activeDefaultCache instanceof self) {
            return static::$activeDefaultCache;
        }

        static::$activeDefaultCache = static::query()
            ->where('is_active', true)
            ->latest('id')
            ->first()
            ?? new static(static::defaultData());

        return static::$activeDefaultCache;
    }

    public function localized(string $field, string $locale): string
    {
        $key = "{$field}_{$locale}";
        $value = $this->getAttribute($key);

        if ($value === null || trim((string) $value) === '') {
            $value = static::defaultData()[$key] ?? '';
        }

        return trim((string) $value);
    }

    public function messageReceiverDisplay(): string
    {
        return trim((string) ($this->whatsapp_display ?: static::defaultData()['whatsapp_display']));
    }

    public function messageReceiverDigits(): string
    {
        $digits = preg_replace('/\D+/', '', $this->messageReceiverDisplay());

        return $digits !== '' ? $digits : '967778080700';
    }

    public function mapEmbedUrl(): string
    {
        return trim((string) ($this->map_embed_url ?: static::defaultData()['map_embed_url']));
    }
}
