<?php

namespace App\Filament\Resources\ProductPageProducts\Tables;

use App\Models\ProductPageProduct;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class ProductPageProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->extraAttributes([
                'class' => 'oy-product-page-products-table',
            ])
            ->header(new HtmlString(<<<'HTML'
                <style>
                    .oy-product-page-products-table .fi-ta-header-ctn {
                        position: relative;
                    }

                    .oy-product-page-products-table .fi-ta-header-toolbar {
                        position: static;
                    }

                    .oy-product-page-products-header {
                        display: flex;
                        min-height: 96px;
                        align-items: center;
                        padding: 1.5rem;
                        padding-inline-end: 14rem;
                    }

                    .oy-product-page-products-header__content {
                        min-width: 0;
                    }

                    .oy-product-page-products-header__title {
                        margin: 0;
                        font-size: 1rem;
                        font-weight: 700;
                        line-height: 1.5;
                    }

                    .oy-product-page-products-header__description {
                        margin: 0.375rem 0 0;
                        font-size: 0.875rem;
                        line-height: 1.75;
                    }

                    .oy-product-page-products-table
                    .oy-product-page-products-reorder-trigger {
                        position: absolute;
                        top: 48px;
                        inset-inline-end: 1.5rem;
                        z-index: 10;
                        width: auto;
                        transform: translateY(-50%);
                    }

                    @media (max-width: 768px) {
                        .oy-product-page-products-header {
                            min-height: 0;
                            padding: 1rem;
                            padding-inline-end: 1rem;
                        }

                        .oy-product-page-products-table
                        .oy-product-page-products-reorder-trigger {
                            position: static;
                            width: 100%;
                            transform: none;
                        }
                    }
                </style>

                <div class="oy-product-page-products-header">
                    <div class="oy-product-page-products-header__content">
                        <h3 class="oy-product-page-products-header__title">
                            ترتيب منتجات الصفحة
                        </h3>

                        <p class="oy-product-page-products-header__description">
                            اضغط على زر ترتيب المنتجات ثم اسحب المنتجات للأعلى أو للأسفل. ستظهر جميع المنتجات أثناء الترتيب ويتم حفظ الترتيب تلقائيًا.
                        </p>
                    </div>
                </div>
                HTML))
            ->columns([
                TextColumn::make('sort_order')
                    ->label('الترتيب الحالي')
                    ->badge()
                    ->alignCenter(),

                ImageColumn::make('preview_image')
                    ->label('الصورة')
                    ->getStateUsing(fn ($record): string => $record->landingImageUrl())
                    ->height(64)
                    ->width(64),

                TextColumn::make('title_ar')
                    ->label('الاسم العربي')
                    ->searchable()
                    ->sortable()
                    ->limit(35),

                TextColumn::make('title_en')
                    ->label('الاسم الإنجليزي')
                    ->searchable()
                    ->sortable()
                    ->limit(35),

                TextColumn::make('desc_ar')
                    ->label('الوصف العربي')
                    ->searchable()
                    ->limit(70)
                    ->wrap(),

                ToggleColumn::make('is_active')
                    ->label('الظهور في الموقع')
                    ->sortable(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->reorderable('sort_order')
            ->paginatedWhileReordering(false)
            ->reorderRecordsTriggerAction(
                fn (Action $action, bool $isReordering): Action => $action
                    ->button()
                    ->label(
                        $isReordering
                            ? 'إنهاء ترتيب المنتجات'
                            : 'ترتيب المنتجات'
                    )
                    ->icon(
                        $isReordering
                            ? 'heroicon-o-check'
                            : 'heroicon-o-arrows-up-down'
                    )
                    ->color('primary')
                    ->extraAttributes([
                        'class' => 'oy-product-page-products-reorder-trigger',
                    ])
            )
            ->afterReordering(function (array $order): void {
                Notification::make()
                    ->title('تم تحديث ترتيب المنتجات')
                    ->body('تم حفظ ترتيب ظهور المنتجات في الموقع بنجاح.')
                    ->success()
                    ->send();
            })
            ->searchPlaceholder('بحث باسم المنتج أو الوصف...')
            ->paginated([10, 25, 50])
            ->defaultPaginationPageOption(10)
            ->recordActions([
                EditAction::make()
                    ->label('تعديل')
                    ->icon('heroicon-o-pencil-square'),

                DeleteAction::make()
                    ->label('حذف')
                    ->icon('heroicon-o-trash')
                    ->visible(fn ($record): bool => blank($record->default_key))
                    ->after(function (): void {
                        ProductPageProduct::normalizeSortOrder();
                    }),
            ]);
    }
}