<?php

namespace App\Filament\Resources\AboutMethodologies;

use App\Filament\Resources\AboutMethodologies\Pages;
use App\Filament\Resources\AboutMethodologies\Schemas\AboutMethodologyForm;
use App\Filament\Resources\AboutMethodologies\Tables\AboutMethodologiesTable;
use App\Models\AboutMethodology;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AboutMethodologyResource extends Resource
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static string|\UnitEnum|null $navigationGroup = 'صفحة من نحن';
    protected static ?string $navigationLabel = 'منهجية العمل';
    protected static ?int $navigationSort = 4;
    protected static ?string $model = AboutMethodology::class;

    protected static ?string $modelLabel = 'منهجية العمل';
    protected static ?string $pluralModelLabel = 'منهجية العمل';

    public static function form(Schema $schema): Schema
    {
        return AboutMethodologyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutMethodologiesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutMethodologies::route('/'),
            'create' => Pages\CreateAboutMethodology::route('/create'),
            'edit' => Pages\EditAboutMethodology::route('/{record}/edit'),
        ];
    }
}
