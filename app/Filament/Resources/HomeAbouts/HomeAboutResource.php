<?php

namespace App\Filament\Resources\HomeAbouts;

use App\Filament\Resources\HomeAbouts\Pages;
use App\Filament\Resources\HomeAbouts\Schemas\HomeAboutForm;
use App\Filament\Resources\HomeAbouts\Tables\HomeAboutsTable;
use App\Models\HomeAbout;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeAboutResource extends Resource
{
    protected static ?string $model = HomeAbout::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';
    protected static \UnitEnum|string|null $navigationGroup = 'الرئيسية';

    protected static ?string $navigationLabel = 'Home About';
    protected static ?string $modelLabel = 'عن الرئيسية';
    protected static ?string $pluralModelLabel = 'عن الرئيسية';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HomeAboutForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeAboutsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeAbouts::route('/'),
            'create' => Pages\CreateHomeAbout::route('/create'),
            'edit'   => Pages\EditHomeAbout::route('/{record}/edit'),
        ];
    }
}
