<?php

namespace App\Filament\Resources\AboutOrientYemens;

use App\Filament\Resources\AboutOrientYemens\Pages;
use App\Filament\Resources\AboutOrientYemens\Schemas\AboutOrientYemenForm;
use App\Filament\Resources\AboutOrientYemens\Tables\AboutOrientYemensTable;
use App\Models\AboutOrientYemen;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AboutOrientYemenResource extends Resource
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';
    protected static string|\UnitEnum|null $navigationGroup = 'صفحة من نحن';
    protected static ?string $navigationLabel = 'عن أورينت يمن';
    protected static ?int $navigationSort = 20;
    protected static ?string $model = AboutOrientYemen::class;

    protected static ?string $modelLabel = 'عن أورينت يمن';
    protected static ?string $pluralModelLabel = 'عن أورينت يمن';

    public static function form(Schema $schema): Schema
    {
        return AboutOrientYemenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutOrientYemensTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutOrientYemens::route('/'),
            'create' => Pages\CreateAboutOrientYemen::route('/create'),
            'edit' => Pages\EditAboutOrientYemen::route('/{record}/edit'),
        ];
    }
}