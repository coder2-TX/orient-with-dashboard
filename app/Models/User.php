<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Allow only this admin user to access Filament dashboard.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return mb_strtolower((string) $this->email, 'UTF-8') === 'oriant26dash@gmail.com';
    }

    public function getFilamentAvatarUrl(): ?string
    {
        $name = trim((string) ($this->name ?: $this->email ?: 'O'));

        preg_match('/[\p{L}\p{N}]/u', $name, $matches);

        $letter = mb_strtoupper($matches[0] ?? 'O', 'UTF-8');

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128">'
            . '<rect width="128" height="128" rx="64" fill="#F79230"/>'
            . '<text x="50%" y="52%" dominant-baseline="middle" text-anchor="middle" fill="#ffffff" font-size="58" font-family="Arial, sans-serif" font-weight="700">'
            . htmlspecialchars($letter, ENT_QUOTES, 'UTF-8')
            . '</text>'
            . '</svg>';

        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }
}