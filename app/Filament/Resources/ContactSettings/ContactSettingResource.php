<?php

namespace App\Filament\Resources\ContactSettings;

use App\Filament\Resources\ContactSettings\Pages;
use App\Filament\Resources\ContactSettings\Schemas\ContactSettingForm;
use App\Filament\Resources\ContactSettings\Tables\ContactSettingsTable;
use App\Models\ContactSetting;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ContactSettingResource extends Resource
{
    protected static ?string $model = ContactSetting::class;

    //  تحت "تواصل معنا"
    protected static string|UnitEnum|null $navigationGroup = 'تواصل معنا';

    protected static ?string $navigationLabel = 'ContactSetting';
    protected static ?string $modelLabel = 'إعدادات التواصل';
    protected static ?string $pluralModelLabel = 'إعدادات التواصل';

    /**
     *  Filament v5: لازم اسمها form() وتستقبل Schema
     */
    public static function form(Schema $schema): Schema
    {
        return ContactSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactSettingsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContactSettings::route('/'),
            'create' => Pages\CreateContactSetting::route('/create'),
            'edit'   => Pages\EditContactSetting::route('/{record}/edit'),
        ];
    }
}
