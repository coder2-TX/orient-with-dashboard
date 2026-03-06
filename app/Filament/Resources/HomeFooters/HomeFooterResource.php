<?php

namespace App\Filament\Resources\HomeFooters;

use App\Filament\Resources\HomeFooters\Pages;
use App\Filament\Resources\HomeFooters\Schemas\HomeFooterForm;
use App\Filament\Resources\HomeFooters\Tables\HomeFootersTable;
use App\Models\HomeFooter;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class HomeFooterResource extends Resource
{
    protected static ?string $model = HomeFooter::class;

    //  تحت "الرئيسية"
    protected static string|UnitEnum|null $navigationGroup = 'الرئيسية';

    protected static ?string $navigationLabel = 'Home Footer';
    protected static ?string $modelLabel = 'Footer';
    protected static ?string $pluralModelLabel = 'Footers';

    public static function form(Schema $schema): Schema
{
    return HomeFooterForm::configure($schema);
}

public static function schema(Schema $schema): Schema
{
    return static::form($schema);
}


    public static function table(Table $table): Table
    {
        return HomeFootersTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeFooters::route('/'),
            'create' => Pages\CreateHomeFooter::route('/create'),
            'edit'   => Pages\EditHomeFooter::route('/{record}/edit'),
        ];
    }
}
