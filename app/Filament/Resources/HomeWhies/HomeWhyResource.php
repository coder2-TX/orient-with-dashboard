<?php

namespace App\Filament\Resources\HomeWhies;

use App\Filament\Resources\HomeWhies\Pages\CreateHomeWhy;
use App\Filament\Resources\HomeWhies\Pages\EditHomeWhy;
use App\Filament\Resources\HomeWhies\Pages\ListHomeWhies;
use App\Filament\Resources\HomeWhies\Schemas\HomeWhyForm;
use App\Filament\Resources\HomeWhies\Tables\HomeWhiesTable;
use App\Models\HomeWhy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeWhyResource extends Resource
{

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static string|\UnitEnum|null $navigationGroup = 'الصفحة الرئيسية';
    protected static ?string $navigationLabel = 'لماذا نحن';
    protected static ?int $navigationSort = 50;
protected static ?string $model = HomeWhy::class;

    protected static ?string $modelLabel = 'لماذا نحن';
    protected static ?string $pluralModelLabel = 'لماذا نحن';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HomeWhyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeWhiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomeWhies::route('/'),
            'create' => CreateHomeWhy::route('/create'),
            'edit' => EditHomeWhy::route('/{record}/edit'),
        ];
    }
}
