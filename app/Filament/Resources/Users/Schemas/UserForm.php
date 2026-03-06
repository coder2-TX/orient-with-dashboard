<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')
                ->label('الاسم')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label('البريد')
                ->email()
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),

            TextInput::make('password')
                ->label('كلمة المرور')
                ->password()
                ->revealable()
                ->autocomplete('new-password')
                ->helperText('اتركه فارغًا إذا لا تريد تغيير كلمة المرور')
                ->rule(Password::default())
                ->confirmed()
                ->afterStateHydrated(fn (TextInput $component) => $component->state(null)) // لا نعرض الهاش
                ->dehydrated(fn ($state) => filled($state)) // يحفظ فقط عند إدخال قيمة
                ->required(fn (string $operation) => $operation === 'create'),

            TextInput::make('password_confirmation')
                ->label('تأكيد كلمة المرور')
                ->password()
                ->revealable()
                ->autocomplete('new-password')
                ->afterStateHydrated(fn (TextInput $component) => $component->state(null))
                ->dehydrated(false)
                ->required(fn (string $operation) => $operation === 'create'),
        ]);
    }
}
