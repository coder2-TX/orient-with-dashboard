<?php

namespace App\Filament\Resources\AboutVisionMissions;

use App\Filament\Resources\AboutVisionMissions\Pages;
use App\Filament\Resources\AboutVisionMissions\Schemas\AboutVisionMissionForm;
use App\Filament\Resources\AboutVisionMissions\Tables\AboutVisionMissionsTable;
use App\Models\AboutVisionMission;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class AboutVisionMissionResource extends Resource
{
    protected static ?string $model = AboutVisionMission::class;

    //  تحت "من نحن"
    protected static string|UnitEnum|null $navigationGroup = 'من نحن';

    protected static ?string $navigationLabel = 'AboutVisionMission';
    protected static ?string $modelLabel = 'رؤية ورسالة';
    protected static ?string $pluralModelLabel = 'رؤيتنا ورسالتنا';

    public static function form(Schema $schema): Schema
{
    return AboutVisionMissionForm::configure($schema);
}


    public static function table(Table $table): Table
    {
        return AboutVisionMissionsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAboutVisionMissions::route('/'),
            'create' => Pages\CreateAboutVisionMission::route('/create'),
            'edit'   => Pages\EditAboutVisionMission::route('/{record}/edit'),
        ];
    }
}
