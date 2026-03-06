<?php

namespace App\Filament\Resources\AboutValues;

use App\Filament\Resources\AboutValues\Pages;
use App\Filament\Resources\AboutValues\Schemas\AboutValueForm;
use App\Filament\Resources\AboutValues\Tables\AboutValuesTable;
use App\Models\AboutValue;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class AboutValueResource extends Resource
{
    protected static ?string $model = AboutValue::class;

    //  تحت "من نحن"
    protected static string|UnitEnum|null $navigationGroup = 'من نحن';

    protected static ?string $navigationLabel = 'AboutValue';
    protected static ?string $modelLabel = 'قيمنا';
    protected static ?string $pluralModelLabel = 'قيمنا';

    public static function form(Schema $schema): Schema
    {
        return AboutValueForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutValuesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAboutValues::route('/'),
            'create' => Pages\CreateAboutValue::route('/create'),
            'edit'   => Pages\EditAboutValue::route('/{record}/edit'),
        ];
    }
}
