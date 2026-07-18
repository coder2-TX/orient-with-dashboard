<?php

namespace App\Filament\Resources\HomeFooters;

use App\Filament\Resources\HomeFooters\Pages;
use App\Filament\Resources\HomeFooters\Schemas\HomeFooterForm;
use App\Filament\Resources\HomeFooters\Tables\HomeFootersTable;
use App\Models\HomeFooter;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeFooterResource extends Resource
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static string|\UnitEnum|null $navigationGroup = 'إعدادات عامة';

    protected static ?string $navigationLabel = 'الفوتر';

    protected static ?int $navigationSort = 10;

    protected static ?string $model = HomeFooter::class;

    protected static ?string $modelLabel = 'الفوتر';

    protected static ?string $pluralModelLabel = 'الفوتر';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HomeFooterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeFootersTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomeFooters::route('/'),
            'edit' => Pages\EditHomeFooter::route('/{record}/edit'),
        ];
    }
}
