<?php

namespace App\Filament\Resources\HomeFacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HomeFactForm
{
    public static function configure(Schema $schema): Schema
    {
        $plusRule = ['regex:/^\+?\d+\+?$/'];

        return $schema->schema([
            TextInput::make('team_count')
                ->label('كادر بشري متخصص')
                ->placeholder('مثال: 52+')
                ->rules($plusRule)
                ->helperText('يسمح: 52+ أو +52 أو 52'),

            TextInput::make('vehicles_count')
                ->label('مركبة توزيع حديثة')
                ->placeholder('مثال: 17+')
                ->rules($plusRule)
                ->helperText('يسمح: 17+ أو +17 أو 17'),

            TextInput::make('warehouses_count')
                ->label('مستودعات مركزية')
                ->placeholder('مثال: 8')
                ->rules($plusRule)
                ->helperText('يسمح: 8 أو 8+'),

            TextInput::make('pos_count')
                ->label('نقاط بيع معتمدة')
                ->placeholder('مثال: 8')
                ->rules($plusRule)
                ->helperText('يسمح: 8 أو 8+'),

            Toggle::make('is_active')
                ->label('مفعل (يظهر في الموقع)')
                ->default(false),
        ]);
    }
}
