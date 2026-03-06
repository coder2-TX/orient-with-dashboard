<?php

namespace App\Filament\Resources\HomeHeroes;

use App\Filament\Resources\HomeHeroes\Pages;
use App\Filament\Resources\HomeHeroes\Schemas\HomeHeroForm;
use App\Filament\Resources\HomeHeroes\Tables\HomeHeroesTable;
use App\Models\HomeHero;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeHeroResource extends Resource
{
    protected static ?string $model = HomeHero::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home';
    protected static string|\UnitEnum|null $navigationGroup = 'الرئيسية';

    protected static ?string $navigationLabel = 'Home Heroes';
    protected static ?string $modelLabel = 'سلايدر الرئيسية';
    protected static ?string $pluralModelLabel = 'سلايدر الرئيسية';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HomeHeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeHeroesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeHeroes::route('/'),
            'create' => Pages\CreateHomeHero::route('/create'),
            'edit'   => Pages\EditHomeHero::route('/{record}/edit'),
        ];
    }
}
