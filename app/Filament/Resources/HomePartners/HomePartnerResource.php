<?php

namespace App\Filament\Resources\HomePartners;

use App\Filament\Resources\HomePartners\Pages;
use App\Filament\Resources\HomePartners\Schemas\HomePartnerForm;
use App\Filament\Resources\HomePartners\Tables\HomePartnersTable;
use App\Models\HomePartner;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomePartnerResource extends Resource
{
    protected static ?string $model = HomePartner::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static string|\UnitEnum|null $navigationGroup = 'الرئيسية';

    protected static ?string $navigationLabel = 'Home Partners';
    protected static ?string $modelLabel = 'شريك';
    protected static ?string $pluralModelLabel = 'شركاء الصفحة الرئيسية';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HomePartnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomePartnersTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomePartners::route('/'),
            'create' => Pages\CreateHomePartner::route('/create'),
            'edit'   => Pages\EditHomePartner::route('/{record}/edit'),
        ];
    }
}
