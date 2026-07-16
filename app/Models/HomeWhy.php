<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeWhy extends Model
{
    protected $table = 'home_why_items';

    protected $fillable = [
        'item_key',
        'sort_order',
        'text_ar',
        'text_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * البطاقات الأساسية الثابتة لقسم لماذا نحن.
     *
     * item_key هو المعرّف الثابت للبطاقة.
     * sort_order قابل للتغيير عن طريق السحب والإفلات.
     */
    public static function defaultItems(): array
    {
        return [
            [
                'item_key' => 'proven_experience',
                'sort_order' => 1,
                'text_ar' => 'خبرة عريقة مسيرة ممتدة وراسخة منذ عام 2007.',
                'text_en' => 'Proven experience — a strong and established journey since 2007.',
                'is_active' => true,
            ],
            [
                'item_key' => 'regional_presence',
                'sort_order' => 2,
                'text_ar' => 'حضور إقليمي تغطية واسعة في عدة دول لضمان وصول أسرع.',
                'text_en' => 'Regional presence — wide coverage across multiple countries for faster reach.',
                'is_active' => true,
            ],
            [
                'item_key' => 'flexibility_scalability',
                'sort_order' => 3,
                'text_ar' => 'مرونة وتوسّع آليات عمل قابلة للتكيف مع متغيرات السوق.',
                'text_en' => 'Flexibility & scalability — operational models that adapt to market changes.',
                'is_active' => true,
            ],
            [
                'item_key' => 'sustainable_partnerships',
                'sort_order' => 4,
                'text_ar' => 'شراكات مستدامة علاقات تجارية طويلة الأمد مبنية على الثقة.',
                'text_en' => 'Sustainable partnerships — long-term business relationships built on trust.',
                'is_active' => true,
            ],
        ];
    }

    /**
     * التأكد من وجود البطاقات الأساسية بدون الاعتماد على رقم الترتيب.
     *
     * لن يتم إنشاء بطاقة جديدة عند تغيير sort_order لأن التحقق
     * أصبح يعتمد على item_key الثابت.
     */
    public static function ensureDefaultItems(): void
    {
        DB::transaction(function (): void {
            $hasCreatedItems = false;

            foreach (self::defaultItems() as $item) {
                $record = self::query()->firstOrCreate(
                    [
                        'item_key' => $item['item_key'],
                    ],
                    [
                        'sort_order' => $item['sort_order'],
                        'text_ar' => $item['text_ar'],
                        'text_en' => $item['text_en'],
                        'is_active' => $item['is_active'],
                    ]
                );

                if ($record->wasRecentlyCreated) {
                    $hasCreatedItems = true;
                }
            }

            /*
             * لا نعيد ترتيب السجلات عند كل فتح للصفحة حتى لا نلغي
             * الترتيب الذي اختاره المستخدم بالسحب والإفلات.
             *
             * تتم إعادة ترقيمها فقط إذا تمت استعادة بطاقة مفقودة.
             */
            if ($hasCreatedItems) {
                self::normalizeSortOrder();
            }
        });
    }

    /**
     * إعادة ترقيم الترتيب بشكل متسلسل: 1، 2، 3، 4.
     */
    public static function normalizeSortOrder(): void
    {
        self::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'sort_order'])
            ->values()
            ->each(function (self $item, int $index): void {
                $expectedSortOrder = $index + 1;

                if ($item->sort_order === $expectedSortOrder) {
                    return;
                }

                $item->updateQuietly([
                    'sort_order' => $expectedSortOrder,
                ]);
            });
    }
}