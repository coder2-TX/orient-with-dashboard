<?php

namespace App\Filament\Resources\HomeWhies\Tables;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class HomeWhiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->extraAttributes([
                'class' => 'home-whies-table',
            ])
            ->header(new HtmlString(<<<'HTML'
                <style>
                    .home-whies-table .fi-ta-header-ctn {
                        position: relative;
                    }

                    .home-whies-table .home-whies-header {
                        display: flex;
                        min-height: 96px;
                        align-items: center;
                        padding: 1.5rem;
                        padding-inline-end: 14rem;
                    }

                    .home-whies-table .home-whies-header__content {
                        min-width: 0;
                    }

                    .home-whies-table .home-whies-header__title {
                        margin: 0;
                        font-size: 1rem;
                        font-weight: 700;
                        line-height: 1.5;
                    }

                    .home-whies-table .home-whies-header__description {
                        margin: 0.375rem 0 0;
                        font-size: 0.875rem;
                        line-height: 1.75;
                    }

                    .home-whies-table .fi-ta-header-toolbar {
                        position: absolute;
                        top: 50%;
                        inset-inline-end: 1.5rem;
                        z-index: 10;
                        width: auto;
                        min-height: 0;
                        padding: 0;
                        border: 0;
                        background: transparent;
                        box-shadow: none;
                        transform: translateY(-50%);
                    }

                    .home-whies-table .fi-ta-header-toolbar > div,
                    .home-whies-table .fi-ta-header-toolbar .fi-ta-actions {
                        width: auto;
                    }

                    @media (max-width: 768px) {
                        .home-whies-table .home-whies-header {
                            min-height: 0;
                            align-items: flex-start;
                            padding: 1rem;
                            padding-bottom: 5rem;
                        }

                        .home-whies-table .fi-ta-header-toolbar {
                            top: auto;
                            right: 1rem;
                            bottom: 1rem;
                            left: 1rem;
                            width: auto;
                            transform: none;
                        }
                    }
                </style>

                <div class="home-whies-header">
                    <div class="home-whies-header__content">
                        <h3 class="home-whies-header__title">
                            بطاقات لماذا نحن
                        </h3>

                        <p class="home-whies-header__description">
                            لتغيير ترتيب ظهور البطاقات في الموقع، اضغط على زر ترتيب البطاقات ثم اسحب الصفوف للأعلى أو للأسفل. يتم حفظ الترتيب تلقائيًا.
                        </p>
                    </div>
                </div>
                HTML))
            ->columns([
                TextColumn::make('sort_order')
                    ->label('الترتيب الحالي')
                    ->badge(),

                TextColumn::make('text_ar')
                    ->label('النص العربي')
                    ->limit(70)
                    ->wrap(),

                TextColumn::make('text_en')
                    ->label('النص الإنجليزي')
                    ->limit(70)
                    ->wrap(),

                ToggleColumn::make('is_active')
                    ->label('الظهور في الموقع'),
            ])
            ->defaultSort('sort_order', 'asc')
            ->reorderable('sort_order')
            ->reorderRecordsTriggerAction(
                fn (Action $action, bool $isReordering): Action => $action
                    ->button()
                    ->label(
                        $isReordering
                            ? 'إنهاء ترتيب البطاقات'
                            : 'ترتيب البطاقات'
                    )
                    ->icon(
                        $isReordering
                            ? 'heroicon-o-check'
                            : 'heroicon-o-arrows-up-down'
                    )
                    ->color('primary')
            )
            ->afterReordering(function (array $order): void {
                Notification::make()
                    ->title('تم تحديث ترتيب البطاقات')
                    ->body('تم حفظ ترتيب ظهور البطاقات في الموقع بنجاح.')
                    ->success()
                    ->send();
            })
            ->paginated(false)
            ->recordActions([
                EditAction::make()
                    ->label('تعديل المحتوى')
                    ->icon('heroicon-o-pencil-square'),
            ]);
    }
}