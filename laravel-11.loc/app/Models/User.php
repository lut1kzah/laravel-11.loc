<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    // Указываем поля таблицы (без поля id, created_at и updated_at)
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'sex',
        'birth_date',
        'avatar',
        'email',
        'password',
        'role_id',
        'api_token',
    ];
    // Список полей для скрытия
    protected $hidden = [
        'password',
        'api_token',
    ];
    // Список полей для преобразования
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    // Связь с таблицей Roles M:1
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
