<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    /**
     *  نستخدمها لمعرفة هل يجب تسجيل الخروج بعد الحفظ
     * (فقط إذا تم تغيير كلمة المرور لنفس المستخدم الحالي)
     */
    protected bool $logoutAfterSave = false;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            //  لا يوجد DeleteAction
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

        //  تسجيل خروج + إنهاء الجلسة بأمان
        Filament::auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        //  إعادة توجيه لصفحة تسجيل الدخول الخاصة بالـ Panel الحالي
        $this->redirect(Filament::getCurrentPanel()->getLoginUrl());
    }
}
