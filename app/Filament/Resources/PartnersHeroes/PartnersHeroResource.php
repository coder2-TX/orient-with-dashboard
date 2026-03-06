<?php

namespace App\Filament\Resources\PartnersHeroes;

use App\Filament\Resources\PartnersHeroes\Pages;
use App\Filament\Resources\PartnersHeroes\Schemas\PartnersHeroForm;
use App\Filament\Resources\PartnersHeroes\Tables\PartnersHeroesTable;
use App\Models\PartnersHero;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class PartnersHeroResource extends Resource
{
    protected static ?string $model = PartnersHero::class;

    //  تحت تبويب "شركاؤنا"
    protected static string|UnitEnum|null $navigationGroup = 'شركاؤنا';

    protected static ?string $navigationLabel = 'PartnersHero';
    protected static ?string $modelLabel = 'نص هيرو الشركاء';
    protected static ?string $pluralModelLabel = 'نص هيرو الشركاء';

    //  Filament v5 يستخدم form(Schema $schema) وليس schema()
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
            'index'  => Pages\ListPartnersHeroes::route('/'),
            'create' => Pages\CreatePartnersHero::route('/create'),
            'edit'   => Pages\EditPartnersHero::route('/{record}/edit'),
        ];
    }
}
