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

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-hand-thumb-up';
    protected static string|\UnitEnum|null $navigationGroup = 'صفحة شركائنا';
    protected static ?string $navigationLabel = 'ثقة الشركاء';
    protected static ?int $navigationSort = 20;
protected static ?string $model = PartnersTrust::class;

    //  تحت "شركاؤنا"

    protected static ?string $modelLabel = 'ثقة الشركاء';
    protected static ?string $pluralModelLabel = 'ثقة الشركاء';

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
