<?php

namespace App\Filament\Resources\HomeServices;

use App\Filament\Resources\HomeServices\Pages;
use App\Filament\Resources\HomeServices\Schemas\HomeServiceForm;
use App\Filament\Resources\HomeServices\Tables\HomeServicesTable;
use App\Models\HomeService;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeServiceResource extends Resource
{

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static string|\UnitEnum|null $navigationGroup = 'الصفحة الرئيسية';
    protected static ?string $navigationLabel = 'خدمات الرئيسية';
    protected static ?int $navigationSort = 30;
protected static ?string $model = HomeService::class;

    protected static ?string $modelLabel = 'خدمة رئيسية';
    protected static ?string $pluralModelLabel = 'خدمات الرئيسية';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HomeServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeServicesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeServices::route('/'),
            'create' => Pages\CreateHomeService::route('/create'),
            'edit'   => Pages\EditHomeService::route('/{record}/edit'),
        ];
    }
}
