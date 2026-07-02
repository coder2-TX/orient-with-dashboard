<?php

namespace App\Filament\Resources\ContactSettings;

use App\Filament\Resources\ContactSettings\Pages;
use App\Filament\Resources\ContactSettings\Schemas\ContactSettingForm;
use App\Filament\Resources\ContactSettings\Tables\ContactSettingsTable;
use App\Models\ContactSetting;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class ContactSettingResource extends Resource
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-phone';

    protected static string|\UnitEnum|null $navigationGroup = 'تواصل معنا';

    protected static ?string $navigationLabel = 'إعدادات التواصل';

    protected static ?int $navigationSort = 10;

    protected static ?string $model = ContactSetting::class;

    protected static ?string $modelLabel = 'إعدادات التواصل';

    protected static ?string $pluralModelLabel = 'إعدادات التواصل';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return ContactSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactSettingsTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(EloquentModel $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactSettings::route('/'),
            'edit' => Pages\EditContactSetting::route('/{record}/edit'),
        ];
    }
}
