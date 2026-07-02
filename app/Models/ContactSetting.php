<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContactSetting extends Model
{
    protected static ?self $activeDefaultCache = null;

    protected $fillable = [
        'title_ar',
        'title_en',
        'lead_ar',
        'lead_en',
        'email_label_ar',
        'email_label_en',
        'email',
        'phone_label_ar',
        'phone_label_en',
        'phone_display',
        'whatsapp_label_ar',
        'whatsapp_label_en',
        'whatsapp_display',
        'locations_title_ar',
        'locations_title_en',
        'locations_description_ar',
        'locations_description_en',
        'locations',
        'form_title_ar',
        'form_title_en',
        'form_description_ar',
        'form_description_en',
        'form_full_name_label_ar',
        'form_full_name_label_en',
        'form_full_name_placeholder_ar',
        'form_full_name_placeholder_en',
        'form_email_label_ar',
        'form_email_label_en',
        'form_email_placeholder_ar',
        'form_email_placeholder_en',
        'form_phone_label_ar',
        'form_phone_label_en',
        'form_phone_placeholder_ar',
        'form_phone_placeholder_en',
        'form_subject_label_ar',
        'form_subject_label_en',
        'form_subject_placeholder_ar',
        'form_subject_placeholder_en',
        'form_message_label_ar',
        'form_message_label_en',
        'form_message_placeholder_ar',
        'form_message_placeholder_en',
        'form_submit_label_ar',
        'form_submit_label_en',
        'map_embed_url',
        'map_title_ar',
        'map_title_en',
        'is_active',
    ];

    protected $casts = [
        'locations' => 'array',
        'is_active' => 'boolean',
    ];

    public static function defaultData(): array
    {
        return [
            'title_ar' => 'تواصل معنا',
            'title_en' => 'Contact Us',
            'lead_ar' => 'يسعدنا استقبال استفساراتكم ومقترحاتكم عبر القنوات التالية:',
            'lead_en' => 'We are happy to receive your inquiries and suggestions through the following channels:',

            'email_label_ar' => 'البريد الإلكتروني',
            'email_label_en' => 'Email',
            'email' => 'info@orientyemen.com',

            'phone_label_ar' => 'الهاتف',
            'phone_label_en' => 'Phone',
            'phone_display' => '+967 734888880',

            'whatsapp_label_ar' => 'واتساب',
            'whatsapp_label_en' => 'WhatsApp',
            'whatsapp_display' => '+967 778 080 700',

            'locations_title_ar' => 'مواقعنا',
            'locations_title_en' => 'Our Locations',
            'locations_description_ar' => 'تعمل أورينت يمن عبر شبكة فروع إقليمية، بما يتيح تواصلًا مباشرًا ودعمًا مستمرًا في الأسواق التي نعمل بها:',
            'locations_description_en' => 'Orient Yemen operates through a regional branch network, enabling direct communication and continuous support in the markets we serve:',
            'locations' => [
                ['name_ar' => 'اليمن', 'name_en' => 'Yemen'],
                ['name_ar' => 'المملكة العربية السعودية', 'name_en' => 'Saudi Arabia'],
                ['name_ar' => 'إندونيسيا', 'name_en' => 'Indonesia'],
            ],

            'form_title_ar' => 'نموذج التواصل',
            'form_title_en' => 'Contact Form',
            'form_description_ar' => 'يمكنكم إرسال رسالتكم مباشرة عبر النموذج التالي، وسيتم التواصل معكم في أقرب وقت:',
            'form_description_en' => 'You can send your message directly using the form below, and we will get back to you as soon as possible:',

            'form_full_name_label_ar' => 'الاسم الكامل',
            'form_full_name_label_en' => 'Full name',
            'form_full_name_placeholder_ar' => 'الاسم الكامل',
            'form_full_name_placeholder_en' => 'Full name',

            'form_email_label_ar' => 'البريد الإلكتروني',
            'form_email_label_en' => 'Email',
            'form_email_placeholder_ar' => 'example@email.com',
            'form_email_placeholder_en' => 'example@email.com',

            'form_phone_label_ar' => 'رقم الهاتف',
            'form_phone_label_en' => 'Phone number',
            'form_phone_placeholder_ar' => '+967 ...',
            'form_phone_placeholder_en' => '+967 ...',

            'form_subject_label_ar' => 'الموضوع',
            'form_subject_label_en' => 'Subject',
            'form_subject_placeholder_ar' => 'عنوان مختصر للرسالة',
            'form_subject_placeholder_en' => 'Short message title',

            'form_message_label_ar' => 'نص الرسالة',
            'form_message_label_en' => 'Message',
            'form_message_placeholder_ar' => 'اكتب رسالتك هنا...',
            'form_message_placeholder_en' => 'Write your message here...',

            'form_submit_label_ar' => 'إرسال الرسالة',
            'form_submit_label_en' => 'Send Message',

            'map_embed_url' => 'https://www.google.com/maps?q=75XV%2BPHG%20%D8%B4%D8%B1%D9%83%D8%A9%20%D8%A3%D9%88%D8%B1%D9%8A%D9%86%D8%AA%20%D9%8A%D9%85%D9%86%2C%20Zero%20St%2C%20Sanaa%2C%20Yemen&z=18&output=embed',
            'map_title_ar' => 'موقعنا على الخريطة',
            'map_title_en' => 'Our Location Map',
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

            if ($current === null || $current === '' || (is_array($current) && count($current) === 0)) {
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

    public function emailAddress(): string
    {
        $email = preg_replace('/\s+/', '', trim((string) ($this->email ?: static::defaultData()['email'])));

        return $email !== '' ? $email : static::defaultData()['email'];
    }

    public function phoneDisplay(): string
    {
        return trim((string) ($this->phone_display ?: static::defaultData()['phone_display']));
    }

    public function phoneTel(): string
    {
        return static::cleanPhoneForTel($this->phoneDisplay());
    }

    public function whatsappDisplay(): string
    {
        return trim((string) ($this->whatsapp_display ?: static::defaultData()['whatsapp_display']));
    }

    public function whatsappDigits(): string
    {
        $digits = preg_replace('/\D+/', '', $this->whatsappDisplay());

        return $digits !== '' ? $digits : '967778080700';
    }

    public function locationsFor(string $locale): array
    {
        $locations = $this->locations;

        if (! is_array($locations) || count($locations) === 0) {
            $locations = static::defaultData()['locations'];
        }

        return collect($locations)
            ->map(fn (array $location): ?string => $location["name_{$locale}"] ?? null)
            ->filter(fn (?string $name): bool => filled($name))
            ->values()
            ->all();
    }

    public function mapEmbedUrl(): string
    {
        return trim((string) ($this->map_embed_url ?: static::defaultData()['map_embed_url']));
    }

    public static function cleanPhoneForTel(string $phone): string
    {
        $phone = trim($phone);

        if ($phone === '') {
            return '';
        }

        $hasPlus = Str::startsWith($phone, '+');
        $digits = preg_replace('/\D+/', '', $phone);

        return ($hasPlus ? '+' : '') . $digits;
    }
}
