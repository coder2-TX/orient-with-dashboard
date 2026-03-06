<?php

namespace App\Filament\Resources\PartnersTrusts;

use App\Filament\Resources\PartnersTrusts\Pages;
use App\Filament\Resources\PartnersTrusts\Schemas\PartnersTrustForm;
use App\Filament\Resources\PartnersTrusts\Tables\PartnersTrustsTable;
use App\Models\PartnersTrust;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class PartnersTrustResource extends Resource
{
    protected static ?string $model = PartnersTrust::class;

    //  تحت "شركاؤنا"
    protected static string|UnitEnum|null $navigationGroup = 'شركاؤنا';

    protected static ?string $navigationLabel = 'PartnersTrust';
    protected static ?string $modelLabel = 'ثقة شركائنا';
    protected static ?string $pluralModelLabel = 'ثقة شركائنا';

    //  الأهم: form وليس schema
    public static function form(Schema $schema): Schema
    {
        return PartnersTrustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PartnersTrustsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPartnersTrusts::route('/'),
            'create' => Pages\CreatePartnersTrust::route('/create'),
            'edit'   => Pages\EditPartnersTrust::route('/{record}/edit'),
        ];
    }
}
