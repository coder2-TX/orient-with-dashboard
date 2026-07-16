<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
         * إضافة معرّف ثابت لكل بطاقة.
         *
         * تركناه nullable أثناء معالجة البيانات القديمة،
         * ووضعنا عليه Unique لمنع تكرار البطاقة لاحقًا.
         */
        Schema::table('home_why_items', function (Blueprint $table): void {
            $table
                ->string('item_key', 60)
                ->nullable()
                ->after('id')
                ->unique();
        });

        $defaultItems = [
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

        DB::transaction(function () use ($defaultItems): void {
            /*
             * السجلات الأربعة الأصلية هي الأقدم.
             * السجل المكرر الذي أنشأته ensureDefaultItems سابقًا
             * يكون غالبًا أحدث سجل.
             */
            $existingItems = DB::table('home_why_items')
                ->orderBy('id')
                ->get();

            $originalItems = $existingItems
                ->take(4)
                ->values();

            /*
             * حذف أي سجلات زائدة عن البطاقات الأربع الثابتة.
             */
            $extraItemIds = $existingItems
                ->slice(4)
                ->pluck('id')
                ->all();

            if ($extraItemIds !== []) {
                DB::table('home_why_items')
                    ->whereIn('id', $extraItemIds)
                    ->delete();
            }

            /*
             * ربط السجلات الأربعة الأصلية بالمفاتيح الثابتة.
             * لا يتم استبدال النصوص التي عدلها المستخدم.
             */
            foreach ($defaultItems as $index => $defaultItem) {
                $existingItem = $originalItems->get($index);

                if ($existingItem !== null) {
                    DB::table('home_why_items')
                        ->where('id', $existingItem->id)
                        ->update([
                            'item_key' => $defaultItem['item_key'],
                        ]);

                    continue;
                }

                /*
                 * في حال كان أحد السجلات الأربعة مفقودًا،
                 * تتم استعادته بالقيم الافتراضية.
                 */
                DB::table('home_why_items')->insert([
                    'item_key' => $defaultItem['item_key'],
                    'sort_order' => $defaultItem['sort_order'],
                    'text_ar' => $defaultItem['text_ar'],
                    'text_en' => $defaultItem['text_en'],
                    'is_active' => $defaultItem['is_active'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            /*
             * معالجة الأرقام المكررة الحالية وإعادتها إلى:
             * 1، 2، 3، 4
             */
            $orderedItemIds = DB::table('home_why_items')
                ->orderBy('sort_order')
                ->orderBy('id')
                ->pluck('id')
                ->values();

            foreach ($orderedItemIds as $index => $itemId) {
                DB::table('home_why_items')
                    ->where('id', $itemId)
                    ->update([
                        'sort_order' => $index + 1,
                    ]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('home_why_items', function (Blueprint $table): void {
            $table->dropUnique([
                'item_key',
            ]);

            $table->dropColumn('item_key');
        });
    }
};