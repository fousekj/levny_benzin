<?php

namespace App\Models;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function hasRole(string $role): bool
    {
        return $this->getAttribute('role') === $role;
    }

    public function sendEmailVerificationNotification()
    {
        VerifyEmail::toMailUsing(static function ($notifiable, string $verificationUrl) {
            return (new MailMessage)->subject('Ověření emailové adresy')
                ->line('Pro ověření adresy klikněte na tlačítko níže')
                ->action('Ověřit emailovou adresu', $verificationUrl)
                ->line('Pokud jste nevytvářeli účet, není nutná další akce');
        });

        parent::sendEmailVerificationNotification();
    }


}
