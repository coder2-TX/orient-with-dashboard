<?php

namespace App\Filament\Resources\HomeFacts;

use App\Filament\Resources\HomeFacts\Pages;
use App\Filament\Resources\HomeFacts\Schemas\HomeFactForm;
use App\Filament\Resources\HomeFacts\Tables\HomeFactsTable;
use App\Models\HomeFact;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeFactResource extends Resource
{
    protected static ?string $model = HomeFact::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';
    protected static \UnitEnum|string|null $navigationGroup = 'الرئيسية';

    protected static ?string $navigationLabel = 'Home Facts';
    protected static ?string $modelLabel = 'أرقام الرئيسية';
    protected static ?string $pluralModelLabel = 'أرقام الرئيسية';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HomeFactForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeFactsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeFacts::route('/'),
            'create' => Pages\CreateHomeFact::route('/create'),
            'edit'   => Pages\EditHomeFact::route('/{record}/edit'),
        ];
    }
}
