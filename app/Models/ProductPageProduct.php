<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductPageProduct extends Model
{
    protected $fillable = [
        'default_key',
        'sort_order',
        'title_ar',
        'title_en',
        'desc_ar',
        'desc_en',
        'image',
        'default_image',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $product): void {
            if (blank($product->sort_order) || $product->sort_order < 1) {
                $product->sort_order = static::nextSortOrder();
            }
        });
    }

    public function landingImageUrl(): string
    {
        if (filled($this->image)) {
            return Storage::disk('public')->url($this->image);
        }

        if (filled($this->default_image)) {
            return asset($this->default_image);
        }

        return asset('assets/images/products/5.jpg');
    }

    public static function nextSortOrder(): int
    {
        return ((int) static::query()->max('sort_order')) + 1;
    }

    public static function normalizeSortOrder(): void
    {
        DB::transaction(function (): void {
            static::query()
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(['id', 'sort_order'])
                ->values()
                ->each(function (self $product, int $index): void {
                    $sortOrder = $index + 1;

                    if ($product->sort_order === $sortOrder) {
                        return;
                    }

                    $product->updateQuietly([
                        'sort_order' => $sortOrder,
                    ]);
                });
        });
    }

    public static function activeItems(): Collection
    {
        if (static::query()->exists()) {
            return static::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();
        }

        return collect(static::defaultItems())
            ->map(fn (array $item): self => new static($item));
    }

    public static function ensureDefaultRows(): void
    {
        foreach (static::defaultItems() as $item) {
            $record = static::query()->firstOrCreate(
                ['default_key' => $item['default_key']],
                $item
            );

            $updates = [];

            if (blank($record->default_image)) {
                $updates['default_image'] = $item['default_image'];
            }

            if (blank($record->title_ar)) {
                $updates['title_ar'] = $item['title_ar'];
            }

            if (blank($record->title_en)) {
                $updates['title_en'] = $item['title_en'];
            }

            if (blank($record->desc_ar)) {
                $updates['desc_ar'] = $item['desc_ar'];
            }

            if (blank($record->desc_en)) {
                $updates['desc_en'] = $item['desc_en'];
            }

            if (! empty($updates)) {
                $record->forceFill($updates)->save();
            }
        }
    }

    public static function defaultItems(): array
    {
        return [
            [
                'default_key' => 'caffino-gold',
                'sort_order' => 1,
                'title_ar' => 'كافينو جولد',
                'title_en' => 'Caffino Gold',
                'desc_ar' => 'قهوة سريعة التحضير بطعم قوي و متوازن.',
                'desc_en' => 'Instant coffee with a strong, balanced taste.',
                'default_image' => 'assets/images/products/5.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'caffino-bold',
                'sort_order' => 2,
                'title_ar' => 'كافينو بولد',
                'title_en' => 'Caffino Bold',
                'desc_ar' => 'قهوة سريعة التحضير بنكهة قوية ومركزة وسكر خفيف.',
                'desc_en' => 'Instant coffee with a bold, concentrated flavor and light sweetness.',
                'default_image' => 'assets/images/products/6.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'caffino-flavors',
                'sort_order' => 3,
                'title_ar' => 'كافينو نكهات',
                'title_en' => 'Caffino Flavors',
                'desc_ar' => 'قهوة سريعة التحضير بنكهات: كلاسيك، بندق، موكا.',
                'desc_en' => 'Instant coffee in classic, hazelnut, and mocha flavors.',
                'default_image' => 'assets/images/products/7.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'glucose-biscuits',
                'sort_order' => 4,
                'title_ar' => 'بسكويت جلوكوز',
                'title_en' => 'Glucose Biscuits',
                'desc_ar' => 'بسكويت كلاسيكي خفيف ومقرمش.',
                'desc_en' => 'Light, crunchy classic biscuits.',
                'default_image' => 'assets/images/products/1.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'parle-digestive-biscuits',
                'sort_order' => 5,
                'title_ar' => 'بسكويت دايجستف بارلي',
                'title_en' => 'Parle Digestive Biscuits',
                'desc_ar' => 'دايجستف بالشعير بقوام مشبع وطعم مميز.',
                'desc_en' => 'Barley digestive biscuits with a satisfying texture and distinctive taste.',
                'default_image' => 'assets/images/products/12.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'parle-bourbon-biscuits',
                'sort_order' => 6,
                'title_ar' => 'بسكويت بربون من بارلي',
                'title_en' => 'Parle Bourbon Biscuits',
                'desc_ar' => 'بسكويت محشي بكريمة شوكولاتة بطعم غني.',
                'desc_en' => 'Chocolate cream-filled biscuits with a rich taste.',
                'default_image' => 'assets/images/products/15.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'nice-biscuits',
                'sort_order' => 7,
                'title_ar' => 'بسكويت نايس',
                'title_en' => 'Nice Biscuits',
                'desc_ar' => 'بسكويت بسيط مقرمش بطعم متوازن.',
                'desc_en' => 'Simple, crunchy biscuits with a balanced flavor.',
                'default_image' => 'assets/images/products/21.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'happy-happy-biscuits',
                'sort_order' => 8,
                'title_ar' => 'بسكويت هابي هابي',
                'title_en' => 'Happy Happy Biscuits',
                'desc_ar' => 'بسكويت الشوكولاتة بحبيبات شوكولاتة.',
                'desc_en' => 'Chocolate biscuits with chocolate chips.',
                'default_image' => 'assets/images/products/11.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'murano-cookies',
                'sort_order' => 9,
                'title_ar' => 'كوكيز مورانو',
                'title_en' => 'Murano Cookies',
                'desc_ar' => 'كوكيز غني بحبيبات الشوكولاتة بطعم فاخر.',
                'desc_en' => 'Premium cookies loaded with chocolate chips.',
                'default_image' => 'assets/images/products/9.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'murano-delight',
                'sort_order' => 10,
                'title_ar' => 'مورانو ديلايت',
                'title_en' => 'Murano Delight',
                'desc_ar' => 'بسكويت محشي بالشوكولاتة الغامقة بطعم مركز ولمسة فخمة.',
                'desc_en' => 'Dark chocolate-filled biscuits with a rich flavor and a premium touch.',
                'default_image' => 'assets/images/products/10.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'fab-biscuit-boxes',
                'sort_order' => 11,
                'title_ar' => 'بسكويت فاب علب',
                'title_en' => 'Fab Biscuit Boxes',
                'desc_ar' => 'بسكويت محشي بكريمة بنكهات: فراولة، فانيليا، شوكولاتة—تغليف علب مناسب للعرض والبيع.',
                'desc_en' => 'Cream-filled biscuits in strawberry, vanilla, and chocolate flavors, packed in boxes ideal for display and retail.',
                'default_image' => 'assets/images/products/4.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'fab-biscuits',
                'sort_order' => 12,
                'title_ar' => 'بسكويت فاب',
                'title_en' => 'Fab Biscuits',
                'desc_ar' => 'بسكويت محشي بكريمة بنكهات: فراولة، فانيليا، شوكولاتة—خيار عملي للوجبات الخفيفة.',
                'desc_en' => 'Cream-filled biscuits in strawberry, vanilla, and chocolate flavors, a practical choice for everyday snacking.',
                'default_image' => 'assets/images/products/17.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'cho-cho-mazaz-chocolate',
                'sort_order' => 13,
                'title_ar' => 'شوكولاتة شوشو مزاز',
                'title_en' => 'Cho Cho Mazaz Chocolate',
                'desc_ar' => 'شوكولاتة بطعم غني وقوام ناعم.',
                'desc_en' => 'Chocolate with a rich flavor and smooth texture.',
                'default_image' => 'assets/images/products/2.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'cho-cho-cups',
                'sort_order' => 14,
                'title_ar' => 'شوشو اكواب',
                'title_en' => 'Cho Cho Cups',
                'desc_ar' => 'أكواب حلى كريمية بنكهات: فانيليا، فراولة، سبرنكلز.',
                'desc_en' => 'Creamy dessert cups in vanilla, strawberry, and sprinkles flavors.',
                'default_image' => 'assets/images/products/13.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'cho-cho-wafer-boxes',
                'sort_order' => 15,
                'title_ar' => 'ويفر شوشو علب',
                'title_en' => 'Cho Cho Wafer Boxes',
                'desc_ar' => 'ويفر مقرمش بطبقات خفيفة وحشوة شوكولاتة لذيذة.',
                'desc_en' => 'Crispy wafers with light layers and a delicious chocolate filling.',
                'default_image' => 'assets/images/products/19.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'melody-candy',
                'sort_order' => 16,
                'title_ar' => 'حلوى ميلودي',
                'title_en' => 'Melody Candy',
                'desc_ar' => 'حلوى بالشوكولاتة بطعم ناعم مناسب للتحلية السريعة.',
                'desc_en' => 'Chocolate candy with a smooth taste, perfect for a quick sweet treat.',
                'default_image' => 'assets/images/products/18.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'sour-zang-candy',
                'sort_order' => 17,
                'title_ar' => 'حلوى ساور زانك',
                'title_en' => 'Sour Zang Candy',
                'desc_ar' => 'حلوى حامضة بطعم قوي ومنعش.',
                'desc_en' => 'Sour candy with a strong and refreshing flavor.',
                'default_image' => 'assets/images/products/3.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'extreme-sour-candy',
                'sort_order' => 18,
                'title_ar' => 'حلوى حامض اكستريم',
                'title_en' => 'Extreme Sour Candy',
                'desc_ar' => 'حموضة أعلى ونكهة جريئة لتجربة اكستريم.',
                'desc_en' => 'Extra sourness with a bold flavor for an extreme candy experience.',
                'default_image' => 'assets/images/products/8.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'cola-candy',
                'sort_order' => 19,
                'title_ar' => 'حلوى كولا',
                'title_en' => 'Cola Candy',
                'desc_ar' => 'حلوى بنكهة الكولا بطعم حلو ومنعش.',
                'desc_en' => 'Cola-flavored candy with a sweet and refreshing taste.',
                'default_image' => 'assets/images/products/16.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'mazola-candy',
                'sort_order' => 20,
                'title_ar' => 'حلوى مازولا',
                'title_en' => 'Mazola Candy',
                'desc_ar' => 'حلوى بنكهات فاكهية متعددة.',
                'desc_en' => 'Candy in a variety of fruity flavors.',
                'default_image' => 'assets/images/products/14.jpg',
                'is_active' => true,
            ],
            [
                'default_key' => 'bobins-candy',
                'sort_order' => 21,
                'title_ar' => 'حلوى بوبنس',
                'title_en' => 'Bobins Candy',
                'desc_ar' => 'حلوى صغيرة ملونة بنكهات فاكهية متنوعة.',
                'desc_en' => 'Small colorful candy pieces in assorted fruit flavors.',
                'default_image' => 'assets/images/products/22.jpg',
                'is_active' => true,
            ],
        ];
    }
}