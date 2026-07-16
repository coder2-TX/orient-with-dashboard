<?php

namespace App\Filament\Resources\HomeWhies\Pages;

use App\Filament\Resources\HomeWhies\HomeWhyResource;
use App\Models\HomeWhy;
use Filament\Resources\Pages\ListRecords;

class ListHomeWhies extends ListRecords
{
    protected static string $resource = HomeWhyResource::class;

    public function mount(): void
    {
        /*
         * يتم التحقق باستخدام item_key الثابت، وليس sort_order.
         * لذلك تغيير ترتيب البطاقات لن يؤدي إلى إنشاء بطاقات مكررة.
         */
        HomeWhy::ensureDefaultItems();

        parent::mount();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}