<?php

namespace App\Filament\Resources\ContactHeroes;

use App\Filament\Resources\ContactHeroes\Pages;
use App\Filament\Resources\ContactHeroes\Schemas\ContactHeroForm;
use App\Filament\Resources\ContactHeroes\Tables\ContactHeroesTable;
use App\Models\ContactHero;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class ContactHeroResource extends Resource
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string|\UnitEnum|null $navigationGroup = 'تواصل معنا';

    protected static ?string $navigationLabel = 'هيرو تواصل معنا';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = ContactHero::class;

    protected static ?string $modelLabel = 'هيرو تواصل معنا';

    protected static ?string $pluralModelLabel = 'هيرو تواصل معنا';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return ContactHeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactHeroesTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(EloquentModel $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactHeroes::route('/'),
            'edit' => Pages\EditContactHero::route('/{record}/edit'),
        ];
    }
}