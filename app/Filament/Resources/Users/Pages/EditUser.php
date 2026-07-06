<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected bool $logoutAfterSave = false;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $passwordWasSent = array_key_exists('password', $data) && filled($data['password'] ?? null);

        $isEditingSelf =
            Filament::auth()->check()
            && ((string) Filament::auth()->id() === (string) $this->getRecord()->getKey());

        $this->logoutAfterSave = $passwordWasSent && $isEditingSelf;

        return $data;
    }

    protected function afterSave(): void
    {
        if (! $this->logoutAfterSave) {
            return;
        }

        Filament::auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        $this->redirect(Filament::getCurrentPanel()->getLoginUrl());
    }
}
