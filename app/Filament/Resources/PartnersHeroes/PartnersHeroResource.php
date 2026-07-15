<?php

namespace App\Filament\Resources\PartnersHeroes;

use App\Filament\Resources\PartnersHeroes\Pages;
use App\Filament\Resources\PartnersHeroes\Schemas\PartnersHeroForm;
use App\Filament\Resources\PartnersHeroes\Tables\PartnersHeroesTable;
use App\Models\PartnersHero;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PartnersHeroResource extends Resource
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-user-group';
    protected static string|\UnitEnum|null $navigationGroup = 'صفحة شركاؤنا';
    protected static ?string $navigationLabel = 'هيرو الشركاء';
    protected static ?int $navigationSort = 10;
    protected static ?string $model = PartnersHero::class;

    protected static ?string $modelLabel = 'هيرو الشركاء';
    protected static ?string $pluralModelLabel = 'هيرو الشركاء';

    public static function form(Schema $schema): Schema
    {
        return PartnersHeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PartnersHeroesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartnersHeroes::route('/'),
            'edit' => Pages\EditPartnersHero::route('/{record}/edit'),
        ];
    }
}
