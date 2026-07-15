<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->sidebarCollapsibleOnDesktop()
            ->brandName('Orient Yemen')
            ->brandLogo(asset('assets/images/header/logo.svg'))
            ->brandLogoHeight('4rem')
            ->favicon(asset('assets/images/header/Brand_Mark.png'))
            ->colors([
                'primary' => [
                    50 => '255, 247, 237',
                    100 => '247, 146, 47',
                    200 => '247, 146, 47',
                    300 => '247, 146, 47',
                    400 => '247, 146, 47',
                    500 => '247, 146, 47',
                    600 => '247, 146, 47',
                    700 => '247, 146, 47',
                    800 => '247, 146, 47',
                    900 => '247, 146, 47',
                    950 => '247, 146, 47',
                ],
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string =>
                    '<link rel="stylesheet" href="' . asset('assets/css/filament-admin.css') . '?v=20260701-avatar-theme-v2">' .
                    '<script src="' . asset('assets/js/filament-filepond-ar.js') . '?v=20260707-filepond-ar"></script>'
            )
            ->navigationGroups([
                'الصفحة الرئيسية',
                'صفحة من نحن',
                'صفحة المنتجات',
                'صفحة منتجاتنا',
                'صفحة شركاؤنا',
                'تواصل معنا',
                'إعدادات عامة',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
