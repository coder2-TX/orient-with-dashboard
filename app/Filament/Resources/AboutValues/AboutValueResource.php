<?php

namespace App\Filament\Resources\AboutValues;

use App\Filament\Resources\AboutValues\Pages;
use App\Filament\Resources\AboutValues\Schemas\AboutValueForm;
use App\Filament\Resources\AboutValues\Tables\AboutValuesTable;
use App\Models\AboutValue;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class AboutValueResource extends Resource
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-sparkles';

    protected static string|\UnitEnum|null $navigationGroup = 'صفحة من نحن';

    protected static ?string $navigationLabel = 'القيم';

    protected static ?int $navigationSort = 3;

    protected static ?string $model = AboutValue::class;

    protected static ?string $modelLabel = 'القيم';

    protected static ?string $pluralModelLabel = 'القيم';

    public static function form(Schema $schema): Schema
    {
        return AboutValueForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutValuesTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutValues::route('/'),
            'create' => Pages\CreateAboutValue::route('/create'),
            'edit' => Pages\EditAboutValue::route('/{record}/edit'),
        ];
    }
}
