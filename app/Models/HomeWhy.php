<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeWhy extends Model
{
    protected $table = 'home_why_items';

    protected $fillable = [
        'sort_order',
        'text_ar',
        'text_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public static function defaultItems(): array
    {
        return [
            [
                'sort_order' => 1,
                'text_ar' => 'خبرة عريقة مسيرة ممتدة وراسخة منذ عام 2007.',
                'text_en' => 'Proven experience — a strong and established journey since 2007.',
                'is_active' => true,
            ],
            [
                'sort_order' => 2,
                'text_ar' => 'حضور إقليمي تغطية واسعة في عدة دول لضمان وصول أسرع.',
                'text_en' => 'Regional presence — wide coverage across multiple countries for faster reach.',
                'is_active' => true,
            ],
            [
                'sort_order' => 3,
                'text_ar' => 'مرونة وتوسّع آليات عمل قابلة للتكيف مع متغيرات السوق.',
                'text_en' => 'Flexibility & scalability — operational models that adapt to market changes.',
                'is_active' => true,
            ],
            [
                'sort_order' => 4,
                'text_ar' => 'شراكات مستدامة علاقات تجارية طويلة الأمد مبنية على الثقة.',
                'text_en' => 'Sustainable partnerships — long-term business relationships built on trust.',
                'is_active' => true,
            ],
        ];
    }

    public static function ensureDefaultItems(): void
    {
        foreach (self::defaultItems() as $item) {
            self::query()->firstOrCreate(
                ['sort_order' => $item['sort_order']],
                [
                    'text_ar' => $item['text_ar'],
                    'text_en' => $item['text_en'],
                    'is_active' => $item['is_active'],
                ]
            );
        }
    }
}
