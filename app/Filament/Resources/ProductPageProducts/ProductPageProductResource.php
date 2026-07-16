<?php

namespace App\Filament\Resources\ProductPageProducts;

use App\Filament\Resources\ProductPageProducts\Pages;
use App\Filament\Resources\ProductPageProducts\Schemas\ProductPageProductForm;
use App\Filament\Resources\ProductPageProducts\Tables\ProductPageProductsTable;
use App\Models\ProductPageProduct;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ProductPageProductResource extends Resource
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-tag';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة المنتجات';

    protected static ?string $navigationLabel = 'المنتجات المفضلة';

    protected static ?int $navigationSort = 20;

    protected static ?string $model = ProductPageProduct::class;

    protected static ?string $modelLabel = 'منتج';

    protected static ?string $pluralModelLabel = 'المنتجات المفضلة';

    protected static ?string $recordTitleAttribute = 'title_ar';

    public static function form(Schema $schema): Schema
    {
        return ProductPageProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductPageProductsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductPageProducts::route('/'),
            'create' => Pages\CreateProductPageProduct::route('/create'),
            'edit' => Pages\EditProductPageProduct::route('/{record}/edit'),
        ];
    }
}