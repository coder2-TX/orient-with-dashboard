<?php

namespace App\Filament\Resources\AboutVisionMissions;

use App\Filament\Resources\AboutVisionMissions\Pages;
use App\Filament\Resources\AboutVisionMissions\Schemas\AboutVisionMissionForm;
use App\Filament\Resources\AboutVisionMissions\Tables\AboutVisionMissionsTable;
use App\Models\AboutVisionMission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class AboutVisionMissionResource extends Resource
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-eye';

    protected static string|UnitEnum|null $navigationGroup = 'صفحة من نحن';

    protected static ?string $navigationLabel = 'الرؤية والرسالة';

    protected static ?int $navigationSort = 2;

    protected static ?string $model = AboutVisionMission::class;

    protected static ?string $modelLabel = 'الرؤية والرسالة';

    protected static ?string $pluralModelLabel = 'الرؤية والرسالة';

    protected static ?string $recordTitleAttribute = 'section_title_ar';

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
            'index' => Pages\ListAboutVisionMissions::route('/'),
            'edit' => Pages\EditAboutVisionMission::route('/{record}/edit'),
        ];
    }
}
