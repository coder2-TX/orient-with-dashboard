<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    public const DEFAULT_BODY_AR = 'تعد أورينت يمن شركة تجارية وتوزيع خاصة رائدة، تأسست عام 2007، ونجحت على مدار أكثر من 19 عاماً في بناء سمعة مرموقة كخبير في استيراد وتسويق وتوزيع المنتجات الغذائية والمشروبات. ترتكز مهمتنا على ربط الموردين بالأسواق العالمية وبناء حضور منظم ومستقر للعلامات التجارية، حيث نمتلك شبكة توزيع واسعة وشاملة تغطي كافة أنحاء اليمن، لتصل خدماتنا بكفاءة عالية إلى السوبر ماركت وتجار الجملة والتجزئة في كل مكان.
وبفضل حضورنا الإقليمي القوي وفروعنا الممتدة في (اليمن، المملكة العربية السعودية، وإندونيسيا)، نتمكن من تقديم حلول تجارية وتسويقية مرنة وقابلة للتوسع. نحن نؤمن بأن نجاح المنتجات لا يعتمد فقط على جودتها، بل على استراتيجية دخولها للسوق وبناء علاقات موثوقة وطويلة الأمد تضمن منفعة المستهلكين والموردين على حد سواء.';

    public const DEFAULT_BODY_EN = 'Orient Yemen is a leading private trading and distribution company, established in 2007. Over more than 19 years, we have built a prestigious reputation as experts in the import, marketing, and distribution of food and beverage products. Our core mission is to bridge the gap between global suppliers and local markets, establishing a structured and stable presence for international brands. We pride ourselves on an extensive and comprehensive distribution network that covers all parts of Yemen, delivering high-efficiency services to supermarkets, wholesalers, and retailers everywhere.
With a strong regional presence and branches across Yemen, Saudi Arabia, and Indonesia, we provide flexible and scalable commercial and marketing solutions. We firmly believe that the success of any product depends not only on its quality but also on a strategic market entry and the cultivation of reliable, long-term relationships that benefit both consumers and suppliers alike.';

    protected $fillable = [
        'body',
        'is_active',
    ];

    protected $casts = [
        'body' => 'array',
        'is_active' => 'boolean',
    ];

    public static function defaultBody(): array
    {
        return [
            'ar' => self::DEFAULT_BODY_AR,
            'en' => self::DEFAULT_BODY_EN,
        ];
    }

    public static function firstOrCreateDefault(): self
    {
        $record = self::query()->orderBy('id')->first();

        if (! $record) {
            return self::query()->create([
                'body' => self::defaultBody(),
                'is_active' => false,
            ]);
        }

        $body = is_array($record->body) ? $record->body : [];
        $changed = false;

        foreach (self::defaultBody() as $locale => $defaultText) {
            if (blank($body[$locale] ?? null)) {
                $body[$locale] = $defaultText;
                $changed = true;
            }
        }

        if ($changed) {
            $record->body = $body;
            $record->save();
        }

        return $record;
    }
}
